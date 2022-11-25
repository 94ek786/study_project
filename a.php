<input type="checkbox" id="myCheck" name="vehicle" value="1">選擇<br>
<button onclick="v()">button</button>
<script>
    function v(){
        i = document.getElementById("myCheck");
        alert(i.check);
        }
</script>

<?php 
//header('Location:'.$_SERVER['REQUEST_URI'].'.123')
?>