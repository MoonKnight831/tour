<?php
class profileinfoctrl extends profileinto{
    private $username;
    private $sno;
    public function __construct($username , $sno){
        $this->$username = $username;
        $this->$sno = $sno;
    } 
    public function defaultProfileInfo(){
        $profileABOUT = "Hey There Wassup";
        $profilTitle= "hey I am " . $this->$username;
        $profileText ="Welcome to the profile page" ;
        $this->setProfileInfo($profileAbout,$profileTitle,$profileText, $his->$userid);
    }
    public function updateProfileInfo($About,$introtitle , $introText){
            //  Error Handlers
            if ($this->emptyInputCheck($About,$introtitle , $introText) == true) {
                    header("location : index.html");
                    exit();
            }

            //Updating profile info
            $this->setNewProfileInfo($About,$introtitle,$introText, $this->$userid)
    }
    private function emptyInputCheck($About,$introtitle , $introText){
        $result;
        if(empty($About) || empty($introtitle) || empty($introText)){
            $result = false;

        }
        else{
            return $result
        }
    }
}