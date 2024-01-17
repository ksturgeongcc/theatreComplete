<?php 
    include '../../components/header.php';
    include '../../components/navigation.php';
?>
<!-- <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('assets/images/login_bg.jpg')">
  <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
    <div class="text-white">
      <div class="mb-8 flex flex-col items-center">
        <img src="<?php ROOT_DIR ?>assets/images/clyde_theatre_tp.png" width="120" alt="" srcset="" />
        <h1 class="mb-2 text-2xl">CLYDE THEATRE</h1>
        <span class="text-gray-300">Enter Login Details</span>
      </div>
      <form action="account/auth/authenticate.php" method="post">
        <div class="mb-4 text-lg">
          <input class="rounded-3xl border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" 
          type="text" name="username" placeholder="username" />
        </div>

        <div class="mb-4 text-lg">
          <input class="rounded-3xl border-none bg-yellow-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" 
          type="Password" name="password" placeholder="*********" />
        </div>
        <div class="mt-8 flex justify-center text-lg text-black">
           <button type="submit" 
          class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600">Login</button> -->
        <!-- <input type="submit" class="rounded-3xl bg-yellow-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-yellow-600" value="LOGIN">

        </div>
      </form>
    </div>
  </div> --> 
  <form action="account/auth/authenticate.php" method="post">
  <div class="flex justify-center h-screen w-screen items-center">
    <div class="w-full md:w-1/2 flex flex-col items-center " >
        <!-- text login -->
        <h1 class="text-center text-2xl font-bold text-white mb-6">LOGIN</h1>
        <!-- email input -->
        <div class="w-3/4 mb-6">
            <input type="text" name="username" id="email" class="w-full py-4 px-8 bg-purple-700 placeholder:font-semibold rounded hover:ring-1 outline-blue-500" placeholder="User Name">
        </div>
        <!-- password input -->
        <div class="w-3/4 mb-6">
            <input type="Password" name="password" id="password" class="w-full py-4 px-8 bg-purple-700 placeholder:font-semibold rounded hover:ring-1 outline-blue-500 " placeholder="Password">
        </div>
        
        <!-- button -->
        <div class="w-3/4 mt-4">
            <button type="submit" class="py-4 bg-yellow-500 w-full rounded text-blue-50 font-bold hover:bg-blue-700" value='LOGIN'> LOGIN</button>
        </div>
    </div>
   </div>
</div>
</form>
<?php 
    include '../../components/footer.php';
?>