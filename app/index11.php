<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document title</title>
</head>
<body>
    <?php 
        $list_data = [
            'list_name' => ( !empty($_POST['list_name']) ? $_POST['list_name'] : "" ), 
            'list_count' => ( !empty($_POST['list_count']) ? $_POST['list_count'] : "")
        ];
        $votes = ( !empty($_POST['votes']) ? $_POST['votes'] : []);
        function compareBySurname ($a, $b) {
            return strcmp($a["candidate_surname"], $b["candidate_surname"]);
        };
        usort($votes, 'compareBySurname');   
    ?>
    <div>
        <form action="./index11.php" method="post">
            <label for="list_name">List name</label> <br>
            <input type="text" id="list_name" name="list_name"> <br>
            <label for="list_count">List count</label> <br>
            <input type="number" id="list_count" name="list_count" min="1"><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <br>
    <div>
        <?php if (!empty($_POST['list_name']) ) { ?>
        <h1> <?php echo $list_data['list_name']; ?> </h1> <br>
        <form action="./index11.php" method="post">
        <?php 
                for($i = 0; $i < $list_data['list_count']; $i++) { ?>
                    <label for="name">Name: </label>
                    <input type="text" id="name" name="votes[<?=$i?>][candidate_name]" >
                    <label for="surname">Surname: </label>
                    <input type="text" id="surname" name="votes[<?=$i?>][candidate_surname]">
                    <input type="radio" id="For" name="votes[<?=$i?>][candidate_vote]" value="For">
                    <Label for="for"> For </Label>
                    <input type="radio" id="against" name="votes[<?=$i?>][candidate_vote]" value="against">
                    <Label for="against"> Against </Label>
                    <input type="radio" id="abstain" name="votes[<?=$i?>][candidate_vote]" value="abstain">
                    <Label for="abstain"> Abstain </Label> 
                    <br>
            <?php } ?>
            <br>
            <input type="submit" value="Submit">
        </form>
        <?php } ?>
    </div>
  
    
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($list_data)) { ?>
        <h2><?php echo $list_Name; ?></h2>
        <table border="1">
            <tr>
                <th>Candidate Names</th>
                <th>Candidate Surname</th>
                <th>Candidate Vote</th>
            </tr>
            <?php foreach ($list_data as $list_name) { ?>
                <tr>
                    <td><?php echo $candidate_name; ?></td>
                    <td><?php echo $candidate_surname; ?></td>
                    <td><?php echo $candidate_vote; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>

</body>
</html>