<?php 
  session_start(); 
  include '../../../components/header.php';
  include '../../../components/navigation.php';
?>

<h1>accounts</h1>
<form action="../account/dashboard/user/addProfilePicture.php" method="post">
<div class="w-full lg:w-6/12 px-4">
  <div class="relative w-full mb-3">
    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
          Upload profile image             
      </label>
    <input 
      type="file" 
      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
      placeholder="Eg: Wizard of Oz"
      name="img_path"
    >
  </div>
  <button type="submit">Add Image </button>
</div>
</form>



<?php 
  include '../../../components/footer.php';
?>