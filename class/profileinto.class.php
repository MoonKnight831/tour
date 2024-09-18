<?php
class profileinto extends Dbh{
    protected function getProfileInfo($userid){
        $stmt = $this->connect()->prepare('SELECT * FROM profile where data_id = ?;')
        if (!$stmt->excute(array($userid))) {
            # code...
            $stmt = null;
            header("location:index.php");

            exit();
        }
        if($stmt->rowCount()==0){
               # code...
               $stmt = null;
               header("location:index.php");
               alert "Something went wrong";
   
               exit();
        }
        $profileDate = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileDate;
   }



   protected function setNewProfileInfo($profileAbout,$profileTitle,$profileText, $userid){
    $stmt = $this->connect()->prepare('UPDATE profile SET PROFILE_About=? ,PROFILE_INTROTILE = ?,PROFILET_INTROTEXT=? WHERE data_id = ?;');
    if (!$stmt->excute(array($profileAbout,$profileTitle,$profileText, $userid))) {
        # code...
        $stmt = null;
        header("location:index.php");

        exit();
    }
    $stmt = null;
   }

   protected function setProfileInfo($profileAbout,$profileTitle,$profileText, $userid){
    $stmt = $this->connect()->prepare('INSERT INTO profile(PROFILE_About , PROFILE_INTROTILE ,PROFILET_INTROTEXT , data_id ) VALUES (?, ?, ?,  ?);');
    if (!$stmt->excute(array($profileAbout,$profileTitle,$profileText, $userid))) {
        # code...
        $stmt = null;
        header("location:index.php");

        exit();
    }
    $stmt = null;
   }

}