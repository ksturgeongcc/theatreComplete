<?php 
    session_start();
    include '../../account/auth/dbConfig.php';
    include '../../components/header.php';
    include '../../components/navigation.php';
    

    $blog = $conn->prepare("SELECT 
	
    b.id,
    b.title,
    b.blog_content,
    b.created_on,
    b.img_path,
    b.show_name,
    b.published

   FROM blog b
   
   ORDER BY published");

$blog->execute();
$blog->store_result();
$blog->bind_result($blogID, $blogTitle, $blogContent, $blogCreated, $imgPath, $showName, $published);
echo $blogID;
?>
<div class="pt-12" style="background-image: url('https://cdn.pixabay.com/photo/2016/10/04/08/58/theater-1713815_960_720.jpg'); background-size: cover; background-position: center;">
  <!-- only show if admin -->
  <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['is_admin']) == 1): ?>
  <div class="mt-3 flex items-end justify-center mb-10">
    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
      <button onclick="window.location.href='a/addBlog';" class="text-sm">ADD BLOG ARTICLE</button>
    </div>
  </div>
  <?php endif ?>
<h1 class="text-center text-2xl font-bold text-white">All Blog Articles</h1>


<!-- Tab Menu -->
<div class="flex flex-wrap items-center  overflow-x-auto overflow-y-hidden py-10 justify-center text-white">
	<a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 text-white">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
			<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
		</svg>
		<span>All Blogs</span>
	</a>
	<a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2 rounded-t-lg text-white">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
			<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
			<path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
		</svg>
		<span>Comedy</span>
	</a>
	<a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-white">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
			<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
		</svg>
		<span>Musicals</span>
	</a>
	<a rel="noopener noreferrer" href="#" class="flex items-center flex-shrink-0 px-5 py-3 space-x-2  text-white">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
			<circle cx="12" cy="12" r="10"></circle>
			<polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
		</svg>
		<span>Opera</span>
	</a>
</div>

  </div>
<!-- Product List -->
<section class="py-10 bg-gray-100">
  <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
  <?php while ($blog->fetch()): ?>

  <article class="rounded-xl bg-purple-600 p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
      
        <div class="relative flex items-end overflow-hidden rounded-xl">
          <img src="<?= ROOT_DIR ?>assets/images/shows/<?= $imgPath ?>" alt="<?= $showName ?>" />
        </div>

        <div class="mt-1 p-2">
          <h2 class="text-white font-bold"><?= $blogTitle ?></h2>
          <p class="mt-1 text-sm text-white blog-content">
            <?= $blogContent ?>
          </p>
          <div class="mt-3 flex items-end justify-between">
            <div class="flex items-center space-x-1.5 rounded-lg bg-purple-900 px-4 py-1.5 text-white duration-100 ">
             
            <button onclick="window.location.href='blogDetails/<?= $blogID ?>';" class="text-sm bg-purple-900">READ MORE...</button>

            </div>
            
          </div>
          <?php if (isset($_SESSION['loggedin']) == TRUE && ($_SESSION['is_admin']) == 1): ?>

          <div class="mt-3 flex items-end justify-between">
          <?php if($published == 1) : ?>
            <div class="flex items-center space-x-1.5 rounded-lg bg-red-500 px-4 py-1.5 text-white duration-100 hover:bg-red-600">
               <button onclick="window.location.href='<?= ROOT_DIR ?>account/dashboard/admin/config/unpublishBlog.php?bid=<?= $blogID ?>';" class="text-sm">UNPUBLISH</button>
            </div>
            <?php else : ?>

            <div class="flex items-center space-x-1.5 rounded-lg bg-green-500 px-4 py-1.5 text-white duration-100 hover:bg-red-600">
                <button onclick="window.location.href='<?= ROOT_DIR ?>account/dashboard/admin/config/publishBlog.php?bid=<?= $blogID ?>';" class="text-sm">PUBLISH</button>
            </div>
        <?php endif ?>
          </div> 
          <?php endif ?>     
        </div>
      
    </article>
    <?php endwhile ?>
  
</section>
<?php
    include '../../components/footer.php';
?>