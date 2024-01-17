<?php 
    session_start();
    include '../../../../components/header.php';
    include '../../../../components/navigation.php'; 
    // echo $_SESSION['id'];
?>
<section class=" py-1 bg-blueGray-50">
<div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-center flex justify-between">
        <h6 class="text-blueGray-700 text-xl font-bold">Add Blog</h6>
       
      </div>
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
      <form action="../account/dashboard/admin/config/addBlogConfig.php" method="post">
        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
          Blog Information
        </h6>
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Blog Title
              </label>
              <input 
                type="text" 
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                placeholder="Eg: New show coming soon"
                name="title"
                >
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Show Name              
                </label>
              <input 
                type="text" 
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                placeholder="Eg: Wizard of Oz"
                name="show_name"
              >
            </div>
          </div>
          <!-- file upload -->
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Upload image             
                </label>
              <input 
                type="file" 
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                placeholder="Eg: Wizard of Oz"
                name="img_path"
              >
            </div>
          </div>
          <!-- blog content -->
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                Blog Information
              </label>
              <textarea style="width: 100%" name="blog_content" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
            ADD BLOG
        </button>
        <hr class="mt-6 border-b-1 border-blueGray-300">

      </form>
    </div>
  </div>
</div>
</section>
<?php include '../../../../components/footer.php'; ?>

