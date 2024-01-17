<?php 
    include '../../components/header.php';
    include '../../components/navigation.php';
?>

<!-- <div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
    <div class="bg-black text-white rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="hidden md:block w-1/2 bg-indigo-500 py-10 px-10" style="background-image: url(<?php ROOT_DIR ?>assets/images/login_bg.jpg); background-position: right;">
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-white">REGISTER</h1>
                    <p>Enter your information to register</p>
                </div>
                <form action="account/auth/register.php" method="post">
               
                <div class="">
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Username</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-white text-lg"></i></div>
                                <input type="text" 
                                class=" rounded-lg text-gray-500 border-none bg-white w-full -ml-10 pl-10 pr-3 py-2 outline-none" 
                                placeholder="John"
                                name="username">
                            </div>
                        </div>
            
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-lg"></i></div>
                                <input type="email" 
                                class=" rounded-lg text-gray-500 border-none bg-white w-full -ml-10 pl-10 pr-3 py-2 outline-none" 
                                placeholder="johnsmith@example.com" 
                                name="email">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-white text-lg"></i></div>
                                <input type="password" name="password" class="text-gray-500 rounded-lg border-none bg-white w-full -ml-10 pl-10 pr-3 py-2 outline-none" placeholder="************">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button class="block w-full max-w-xs mx-auto bg-yellow-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold" type="submit">REGISTER NOW</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>     -->
<div class="container mx-auto">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-black hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
						style="background-image: url('https://cdn.pixabay.com/photo/2018/02/19/11/31/dress-3164824_960_720.jpg')"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-7/12 bg-purple-900 p-5 rounded-lg lg:rounded-l-none">
						<h3 class="pt-4 text-2xl text-center text-white">Create an Account!</h3>
						<form action="account/auth/register.php" method="post" class="px-8 pt-6 pb-8 mb-4 bg-purple-900 rounded">
							<div class="">
								
								<div class="">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="username">
										User Name
									</label>
									<input
										class="w-full bg-purple-900 px-3 py-2 text-sm leading-tight text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        name='username'
										id="username"
										type="text"
										placeholder="User Name"
									/>
								</div>
							</div>
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Email
								</label>
								<input
									class="w-full bg-purple-900 px-3 py-2 mb-3 text-sm leading-tight text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
									id="email"
									type="email"
									placeholder="Email"
                                    name='email'
								/>
							</div>
							<div class="mb-4 md:flex md:justify-between">
								<div class="mb-4 md:mr-2 md:mb-0">
									<label class="block mb-2 text-sm font-bold text-gray-700" for="password">
										Password
									</label>
									<input
										class="w-full bg-purple-900 px-3 py-2 mb-3 text-sm leading-tight text-white border  rounded shadow appearance-none focus:outline-none focus:shadow-outline"
										id="password"
										type="password"
										placeholder="******************"
                                        name='password'
									/>
									<!-- <p class="text-xs italic text-red-500">Please choose a password.</p> -->
								</div>
								
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-yellow-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
									type="submit"
								>
									Register Account
								</button>
							</div>
							<hr class="mb-6 border-t" />
							
							
						</form>
					</div>
				</div>
			</div>
		</div>
    
    
<?php include '../../components/footer.php'; ?>