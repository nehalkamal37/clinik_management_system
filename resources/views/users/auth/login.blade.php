
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<!-- Registration 8 - Bootstrap Brain Component -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
	
  .loginform{display: none};

</style>
<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
              <div class="col-12 col-md-6">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                 src="{{ asset('logoo.jpg')}}" alt="Welcome back you've been missed!">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <div class="text-center mb-4">
                          
                          </div>
                          <h2 class="h4 text-center">Log in</h2>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex gap-3 flex-column">
                          <a href="#!" class="btn btn-lg btn-outline-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                              <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                            <span class="ms-2 fs-6">Log in with Google</span>
                          </a>
                        </div>
                        <p class="text-center mt-4 mb-5">Or enter your details to login</p>
                      </div>
                    </div>
                    <div class="row gy-3 overflow-hidden">

                    <div class="mt-4">
                      <select  id="choice" class="form-select" >
                          <option value="" selected disabled>choose your type type</option>
                          <option value="admin">admin</option>
                          <option value="user">user</option>
                        </select>
                  </div>
                    </div>
                    <div></div>
                  {{--   user login form  --}}
                  <div class="loginform" id="user">
                    <label><h4>log in as a user</h4></label>
                    <form method="POST" action="{{ route('login.user') }}">
                        @csrf
                       
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                            <label for="email" class="form-label">Email</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                            <label for="password" class="form-label">Password</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                            <label class="form-check-label text-secondary" for="iAgree">
                              I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button class="btn btn-dark btn-lg" type="submit">Sign in</button>
                          </div>
                        </div>
                      </div>
                    </form>
              </div>


{{--   admin form --}}
<div class="loginform" id="admin">
  <label><h4>log in as admin</h4></label>

                    <form method="POST" action="{{ route('login.admin') }}">
                      @csrf
            
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                          <label for="email" class="form-label">Email</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                          <label for="password" class="form-label">Password</label>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg" type="submit">Sign up</button>
                        </div>
                      </div>
                    </div>
                  </form>

                </div>


                    <div class="row">
                      <div class="col-12">
                        <p class="mb-0 mt-5 text-secondary text-center">dont have an account? <a href="{{ route('user-register')}}" class="link-primary text-decoration-none">Sign up</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    $('#choice').change(function (){
      var myid=$(this).val();
      $('.loginform').each(function (){
        myid === $(this).attr('id') ? $(this).show() :$(this).hide();
      });
    });
    </script>