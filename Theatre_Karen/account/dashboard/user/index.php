<?php 
  session_start(); 
  include '../../../components/header.php';
  include '../../../components/navigation.php';
?>

<div class="px-3 md:lg:xl:px-40   border-t border-b py-20 bg-opacity-10" style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png') ;">
        <div class="grid grid-cols-1 md:lg:xl:grid-cols-3 group bg-white shadow-xl shadow-neutral-100 border ">
            

            <div onclick="window.location.href='../blogs'"  
            class="p-10 flex flex-col items-center text-center group   md:lg:xl:border-b hover:bg-slate-50 cursor-pointer">
                <span class="p-5 rounded-full bg-yellow-500 text-white shadow-lg shadow-yellow-200"><svg
                        xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg></span>
                <p class="text-xl font-medium text-slate-700 mt-3">View Blogs</p>
                <p class="mt-2 text-sm text-slate-500">View and comment on blog artices</p>
            </div>
          </div>
    </div>

  <?php include '../../../components/footer.php'; ?>

