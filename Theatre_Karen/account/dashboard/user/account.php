<?php 
  session_start(); 
  include '../../../components/header.php';
  include '../../../components/navigation.php';

  
?>
<h1>accounts</h1>
<div class="flex h-24 w-24">
  
</div>

<form action="../account/dashboard/user/addProfilePicture.php" method="post" enctype="multipart/form-data">
<div class="flex justify-center">
  <div class="w-full lg:w-6/12 px-4">
    <div class="relative w-full mb-3">
      <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
            Upload profile image             
        </label>
      <input 
        type="file" 
        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
        placeholder="Choose Image"
        name="img_path"
      >
    </div>
    <input type="submit" value="submit" name="submit">
  </div>
</div>
</form>
<?php 
  include '../../../components/footer.php';
?>