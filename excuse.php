<!DOCTYPE html>
<html>
<head>
    
    <link href="./css/style.css" rel="stylesheet" type="text/css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
    <title>Apology Generator</title>

   
</head>
<body>
    <header>
    <img src="./assets/sorry.png" >
        <h1>Apology Generator</h1>
    </header>
    <div class=form_container>
         <form method="post" action="excuse.php">
            <fieldset>
                 <legend> fill your informations here : </legend>
            <label for="child_name">Child's Name:</label>
            <input type="text" id="child_name" name="child_name" class="input_text" required><br><br>

            <label for="child_gender">Child's Gender:</label>
            <input type="radio" id="girl" name="child_gender" value="girl" required>
            <label for="girl">Girl</label>
            <input type="radio" id="boy" name="child_gender" value="boy" required>
            <label for="boy">Boy</label><br><br>

            <label for="teacher_name">Teacher's Name:</label>
            <input type="text" id="teacher_name" name="teacher_name" class="input_text" required><br><br>

            <label for="parent_name">Parent's Name:</label>
            <input type="text" id="parent_name" name="parent_name" class="input_text" required><br><br>
            </fieldset>    
     
    <fieldset>
        <legend> Reason of absence : </legend>

        <input type="radio" id="illness" name="excuse_reason" value="illness" required>
        <label for="illness">Illness</label><br>
        <input type="radio" id="pet_death" name="excuse_reason" value="pet_death" required>
        <label for="pet_death">Death of a Pet/Family Member</label><br>
        <input type="radio" id="extracurricular_activity" name="excuse_reason" value="extracurricular_activity" required>
        <label for="extracurricular_activity">Significant Extra-curricular Activity</label><br>
        <input type="radio" id="other_excuse" name="excuse_reason" value="other_excuse" required>
        <label for="other_excuse">Other</label><br><br>
    </fieldset>
        <input type="submit" value="Generate Apology">
    </form>
</div>

    <?php
    if (isset($_POST["child_name"]) && isset($_POST["child_gender"]) && isset($_POST["teacher_name"]) && isset($_POST["excuse_reason"])) {
        $childName = $_POST["child_name"];
        $gender = $_POST["child_gender"];
        $teacherName = $_POST["teacher_name"];
        $reason = $_POST["excuse_reason"];
        $pronoun = $gender == "boy" ? "he" : "she";
        $perso = $gender == "boy" ? "his" : "her";
        $parent = $_POST["parent_name"];

        $currentDate = date("l, \\t\\h\\e jS F Y");
        $child_gender = "boy" ? "son" : "daughter";
    
        $excuse = "";
        switch ($reason) {
            case "illness":
                $excuses = array(
                    "My $child_gender, $childName, is unable to attend school today due to illness.<br>
                     $pronoun has been experiencing flu-like symptoms and the doctor has advised rest and recovery at home.<br> 
                     I apologize for any inconvenience caused and kindly request that $pronoun missed assignments be provided so $pronoun can catch up on $perso studies.",

                    "I regret to inform you that $childName won't be able to attend school today as $pronoun is feeling unwell. <br>
                    $pronoun has a high fever and has been advised by the doctor to take a day off for rest and recuperation.<br>
                     Please provide any necessary materials for $perso to keep up with the classwork.", 

                    "$childName is unable to come to school today due to an illness. <br>
                    $pronoun has been experiencing severe headaches and fatigue, which require $childName to stay home and receive proper rest. <br>
                    I kindly request your understanding and cooperation in providing $perso with the missed classwork.",

                    "Due to illness, $childName will be absent from school today. <br>
                    $pronoun has been experiencing stomach discomfort and is under medical supervision.<br> 
                    Please let me know of any assignments or tasks $perso needs to complete during $perso absence."
                );
                $excuse = $excuses[array_rand($excuses)];
                break;
            case "pet_death":
                $excuses = array(
                    "I am writing to inform you that $childName won't be able to attend school today due to the unexpected passing of our family pet.<br>
                     $pronoun is deeply saddened by this loss and needs some time to grieve and come to terms with it. <br>
                     I apologize for any inconvenience caused and appreciate your understanding in granting $perso this day off.",

                    "We regret to inform you that $childName will be absent from school today due to the unfortunate demise of a family member.<br>
                     $pronoun is emotionally distraught and requires our support during this difficult time.<br>
                      We kindly request your understanding and assistance in helping $perso catch up on any missed work.",

                    "$childName will not be able to attend school today due to the sudden loss of a beloved pet.<br>
                     $pronoun is devastated by this event and needs some time to process $perso emotions. <br>
                     I apologize for any disruption caused and kindly ask for your support in helping $perso cope with this situation.",

                    "Unfortunately, $childName won't be able to come to school today due to the unexpected passing of a family pet. <br>
                    $pronoun is deeply saddened by this loss and needs some time to mourn.<br>
                     I kindly request your understanding and cooperation in allowing $perso this day off."
                );
                $excuse = $excuses[array_rand($excuses)];
                break;
            case "extracurricular_activity":
                $excuses = array(
                    "I am writing to inform you that $childName will be absent from school today due to $pronoun's involvement in a significant extracurricular activity. <br>
                    $pronoun has been selected to represent $perso school/team/club in an important event that requires $perso presence. <br>
                    This opportunity is a great honor, and we kindly request your support in granting $perso the day off. <br>
                    We assure you that $pronoun will make every effort to catch up on any missed assignments or classwork upon $perso return.",

                    "$childName has been given a unique opportunity to participate in a significant extracurricular activity today. <br>
                    $pronoun has been selected to perform an event that holds great value for $perso personal growth.<br>
                     We kindly request your understanding and support in granting this absence. <br>
                     $pronoun will make every effort to make up for any missed work upon $perso return.",

                    "I regret to inform you that $childName won't be able to attend school today due to $perso involvement in a significant extracurricular activity.<br>
                     $pronoun has been invited to represent $perso school/team/club at a prestigious event, and $pronoun's presence is essential.<br>
                      We kindly request your understanding and support in granting $perso this day off. $pronoun will be responsible for catching up on any missed work.",

                    "$childName has been given an extraordinary opportunity to participate in a significant extracurricular activity today. <br>
                    $perso exceptional talents and dedication have earned $perso this chance to showcase $perso abilities.<br>
                     We kindly request your understanding and support in allowing $perso this absence. <br>
                     $pronoun will ensure that $pronoun covers all missed material and assignments upon $perso return."
                );
                $excuse = $excuses[array_rand($excuses)];
                break;
            case "other_excuse":
                $excuses = array(
                    "I regret to inform you that $childName won't be able to attend school today due to unforeseen circumstances that require $perso immediate attention.<br>
                     We apologize for any inconvenience caused and appreciate your understanding in granting $perso this day off.<br>
                      $pronoun will make every effort to catch up on any missed work.",

                    "Due to an unavoidable family commitment, $childName will be absent from school today. <br>
                    We understand the importance of regular attendance and will ensure that $pronoun makes up for any missed assignments or classwork. <br>
                    We kindly request your support and understanding in this matter.",

                    "I apologize for the short notice, but $childName will be unable to attend school today due to a transportation issue. <br>
                    Rest assured, we will take necessary measures to prevent such incidents in the future and ensure $perso regular attendance.<br>
                     We appreciate your understanding and cooperation.",

                    "$childName will be absent from school today as $pronoun has an essential appointment related to $perso health. <br>
                    We apologize for any inconvenience caused and kindly request your support in granting $perso this absence.<br>
                     $pronoun will be responsible for covering any missed material and assignments upon $perso return."
                );
                $excuse = $excuses[array_rand($excuses)];
                break;
        }

        echo "<h2>Generated Apology</h2>";
        echo "<p> $currentDate </p>";
        echo "<p> Dear $teacherName ,</p>";
        echo "<p> $excuse </p>";
        echo "<p> $parent. </p>";
  
    }
    ?>
    

</body>
</html>
