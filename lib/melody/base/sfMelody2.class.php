<?php
class sfMelody2 extends sfOAuth2
{
  protected $user_factory;

  public function getUserFactory()
  {
    if(is_null($this->user_factory))
    {
      $config = $this->getConfig();
      $link_config = isset($config['link'])?$config['link']:array();

      $this->user_factory = new sfMelodyUserFactory($link_config);
    }

    return $this->user_factory;
  }

  public function setUserFactory($user_factory)
  {
    $this->user_factory = $user_factory;
  }

  public function connect($user, $auth_parameters = array())
  {
    $this->requestAuth($auth_parameters);
  }
}