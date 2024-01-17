<?php 
    session_start(); 
    include '../../../auth/dbConfig.php';
    include '../../../../components/header.php'; 
    include '../../../../components/navigation.php'; 

    $users = $conn->prepare('SELECT 
        u.id,
        u.username,
        u.email,
        u.active,
        u.is_admin

       FROM users u

       where u.is_admin = 0

       
      ');
$users->execute();
$users->store_result();
$users->bind_result($userId, $userName, $userEmail, $userActive, $admin);

// passing the userid into the modal --  This is probably not the best way to do this, over time you will 
// learn different ways of writing your programmes 



?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<!--table of users  -->
    

  <!-- delete popup -->

  <!-- at this in to the while loop?? -->
  
  <div class="container w-full md:w-4/5  mx-auto px-2">

		<!--Title-->
	
    <h1>ALL USERS</h1>  


		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <button onclick="window.location.href='./addUser.php';" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">ADD USER</button>


			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">ID</th>
						<th data-priority="2">Username</th>
						<th data-priority="3">email</th>
						<th data-priority="4">Status</th>
						<th data-priority="6">Manage</th>
					</tr>
				</thead>
				<tbody>
        <?php while ($users->fetch()): ?>
					<tr>
						<td><?= $userId ?></td>
						<td><?= $userName ?></td>
						<td><?= $userEmail ?></td>
						<td>
            <?php if ($userActive == 1): ?>
          <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
            Active
          </span>
          <?php else: ?>  

          <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
            Inactive
          </span>
          <?php endif ?>
            </td>
					
						<td>
            <div class="flex justify-end gap-4">
            <a class="delete-id" href="#" onclick="window.location.href='deleteUser/<?= $userId ?>'">
            <button  x-data="{ tooltip: 'Delete' }" class="delete-btn">
          
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
                x-tooltip="tooltip"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                />
              </svg>
          </button>
          </a>
          <button>
            <a x-data="{ tooltip: 'Edite' }" onclick="window.location.href='editUser/<?=$userId?>';">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
                x-tooltip="tooltip"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                />
              </svg>
            </a>
            </buttn>
            <?php if ($userActive == 1): ?>
            <button onclick="window.location.href='deactivateUser/<?= $userId ?>';">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
                >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" 
                  />
              </svg>
            </button>
          <?php elseif ($userActive == 0): ?>
          <button onclick="window.location.href='activateUser/<?= $userId ?>';">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
                >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />

              </svg>
          </button>
         <?php endif ?>


          </div>
            </td>
             
					</tr>

          <?php endwhile ?>
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->





	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

  <script>


/*
could also send it to a differnet page that looks like a popup redirects back if cancel is clicked delete will run a script

*/





// function showDeleteModal(user_id) {
//   // Get the delete modal element
//   var modal = document.getElementById("delete_modal");

//   // Update the modal with the user ID
//   modal.querySelector(".modal-user-id").innerHTML = user_id;

//   // Show the modal
//   modal.style.display = "block";
// }


// const deleteBtn = document.querySelectorAll('.delete-btn');
// const deleteModal = document.getElementById('delete_modal');
// const cancel = document.querySelector('.cancel');

// const deleteBtn = document.querySelectorAll('.delete-btn').forEach(item => {
//   item.addEventListener('click', event => {
//     handle click 
//     deleteModal.classList.add('delete-show');
   
//   })

// })
// cancel.addEventListener('click', function() {
//     deleteModal.classList.remove('delete-show');
//   });





    </script>
  <?php include '../../../../components/footer.php'; ?>