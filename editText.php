<?php
session_start();

//  check for submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // update with new content
    $_SESSION['content'] = $_POST['content'];
}

// init
if (!isset($_SESSION['content'])) {
    $_SESSION['content'] = '
        <h1 contenteditable="true">Editable Header 1</h1>
        <p contenteditable="true">Editable Paragraph 1</p>
        <h1 contenteditable="true">Editable Header 2</h1>
        <p contenteditable="true">Editable Paragraph 2</p>
        <h1 contenteditable="true">Editable Header 3</h1>
        <p contenteditable="true">Editable Paragraph 3</p>
    ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Content Editable Example</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .editable {
        border: 1px solid #ccc;
        padding: 5px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<?php
// grab/output session content
echo $_SESSION['content'];
?>

<form id="updateForm" method="post">
    <button id="updateBtn" type="submit">Update Content</button>
    <input type="hidden" id="contentInput" name="content">
</form>

<script>
$(document).ready(function(){
    // update input with the content
    $("#updateForm").submit(function(){
        $("#contentInput").val($("body").html());
    });

    // restore state
    $("body").html('<?php echo $_SESSION['content']; ?>');
    
    // disable editable when the button is clicked
    $("#updateBtn").click(function(){
        $("body [contenteditable]").attr("contenteditable", "false");
    });
});
</script>

</body>
</html>