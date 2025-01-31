<?php
/**
 *------
 * BGA framework: © Gregory Isabelli <gisabelli@boardgamearena.com> & Emmanuel Colin <ecolin@boardgamearena.com>
 * TutorialSavonette implementation : © <Your name here> <Your email address here>
 *
 * This code has been produced on the BGA studio platform for use on https://boardgamearena.com.
 * See http://en.doc.boardgamearena.com/Studio for more information.
 * -----
 * 
 * tutorialsavonette.action.php
 *
 * TutorialSavonette main action entry point
 *
 *
 * In this file, you are describing all the methods that can be called from your
 * user interface logic (javascript).
 *       
 * If you define a method "myAction" here, then you can call it from your javascript code with:
 * this.ajaxcall( "/tutorialsavonette/tutorialsavonette/myAction.html", ...)
 *
 */
  
  
  class action_tutorialsavonette extends APP_GameAction
  { 
    // Constructor: please do not modify
   	public function __default()
  	{
  	    if( self::isArg( 'notifwindow') )
  	    {
            $this->view = "common_notifwindow";
  	        $this->viewArgs['table'] = self::getArg( "table", AT_posint, true );
  	    }
  	    else
  	    {
            $this->view = "tutorialsavonette_tutorialsavonette";
            self::trace( "Complete reinitialization of board game" );
      }
  	} 
  	
  	// TODO: defines your action entry points there

    public function playActionCard() {
      self::setAjaxMode();
      self::trace( "playActionCard" );
      $card_id = self::getArg("id", AT_posint, true);
      //$this->game->playCardAction($card_id);    
      $this->game->playCard($card_id); 
      self::ajaxResponse();
  }

    public function playCard() {
      self::setAjaxMode();
      self::trace( "playCard" );
      $card_id = self::getArg("id", AT_posint, true);
      $this->game->playCard($card_id);
      self::ajaxResponse();
  }

  public function confirmactionmarketsell() {
		self::setAjaxMode();
		$possibleValues = array("marble", "wood", "fabric", "gold", "spice", "metal");
		//$resource = self::getArg("resource", AT_enum, true, 'marble', $possibleValues);
		//$result = $this->game->acConfirmActionMarketSell($resource);
		self::ajaxResponse();
	}

  public function cancelAction() {
		self::setAjaxMode();
		$result = $this->game->acCancelAction();
		self::ajaxResponse();
	}

  }
  

