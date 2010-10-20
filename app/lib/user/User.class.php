<?php

class User extends AgaviRbacSecurityUser
{
  protected $user;

  public function startup()
  {
    // call parent
    parent::startup();

    $reqData = $this->getContext()->getRequest()->getRequestData();

    if(!$this->isAuthenticated() && $reqData->hasCookie('autologon')) {
      $login = $reqData->getCookie('autologon');
  
      try {
        $this->login($login['username'], $login['password']);
      } catch(AgaviSecurityException $e) {
        $response = $this->getContext()->getController()->getGlobalResponse();

        // Unset the the login cookie since it didn't work
        $response->setCookie('autologon[username]', false);
        $response->setCookie('autologon[password]', false);
      }
    }
  }
  
  public function login($username, $password, $isPasswordHashed = false)
  {
    $userManager = $this->getContext()->getModel('\WebFeatures\DAO\UserDAO');
    $user = $userManager->findByLogin($username);
    if (!$user)
    {
    	throw new AgaviSecurityException('no user');
    }
    
	$user = $user[0];
    if(!$user->getId()) {
      throw new AgaviSecurityException('username error');
    }

    if($password != $user->getPassword()) {
      throw new AgaviSecurityException('password error');
    }
  
    $this->setAttribute('id', $user->getId(), 'org.code-house.user');

    $this->setAuthenticated(true);
    $this->grantRoles(array('admin'));

    $this->user = $user;

    return true;
  }

  public function logout()
  {
    $this->clearCredentials();
    $this->setAuthenticated(false);
  }

  public function getCurrentUser()
  {
    if ($this->isAuthenticated()) {
      return $this->user;
    }
  }
}
