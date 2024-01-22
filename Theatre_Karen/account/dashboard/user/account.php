<?php 
  session_start(); 
  include '../../../account/auth/dbConfig.php';
  include '../../../components/header.php';
  include '../../../components/navigation.php';
  $uid = $_SESSION['id'];
  $profileImg = $conn->prepare(" SELECT 
  img_path
  FROM users
  WHERE id = $uid ");
  $profileImg->execute();
  $profileImg->store_result();
  $profileImg->bind_result($img_path);
  $profileImg->fetch();
  $errorMsg = $_GET['err'] ?? ''; // Use the null coalescing operator
  
?>
<h1>accounts</h1>
<div class="flex h-24 w-full justify-center">
  <img src="<?= ROOT_DIR ?>account/dashboard/user/images/<?= $img_path ?>" alt="">
</div>
 <!-- Display error message if it exists -->
 <?php if (!empty($errorMsg)) : ?>
        <div class="mb-4 text-red-500 w-full text-center">
          
          <?= $errorMsg?>
        </div>
      <?php endif; ?>
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
  unset($errorMsg);

  include '../../../components/footer.php';
?>