<?php if(isset($result) && $result == 'success'){
?>
<div class="blur-center"></div>
<div class="blur-center"></div>
<h2 class="text-center mt-5 text-light">
    <div><span class="text-success-emphasis border border-success px-3 rounded-2 p-3 bold">ADD SUCCESS!</span></div>
</h2>
<?php } else {?>
<div class="blur-center"></div>
<div class="blur-center"></div>
<h2 class="text-center mt-5 text-light">
    <div><span class="text-danger border border-danger px-3 rounded-2 p-3 bold">ADD FALSE!</span></div>
</h2>
<?php }
$result = 'false';