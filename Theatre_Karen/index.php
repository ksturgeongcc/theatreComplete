<?php 
    session_start();
    include 'components/header.php';
    include 'account/auth/dbConfig.php';
?>
  <div class="bg-gray-50 flex items-center">
    <section class="w-full bg-cover bg-center py-32" style="background-image: url('https://cdn.pixabay.com/photo/2020/02/03/10/02/dance-4815231_960_720.jpg');">
      <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-medium mb-6">Welcome to Clyde Theatre</h1>
        <p class="text-xl mb-12">Unmissable theatre, whenever you want it..</p>
        <a href="<?php ROOT_DIR ?>blogs" class="text-white py-4 px-12 rounded-full bg-purple-900 hover:bg-indigo-600" >WHAT'S ON</a>
      </div>
    </section>
    
  </div>
  
<?php include 'components/navigation.php'; ?>
<!-- advert component - 3 boxes -->
<?php include 'components/latest.php'; ?>
<!-- Upcoming shows -->
<?php include 'components/blogSection.php'; ?>
<?php include 'components/upcomingShows.php'; ?>
<?php include 'components/footer.php'; ?>

