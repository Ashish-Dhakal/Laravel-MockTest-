@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User Profile</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
      
          <!-- Profile Content -->
          <div class="col-md-9 mx-auto">
            <!-- Profile Header -->
            <div class="profile-header position-relative" style="background-image: url('https://via.placeholder.com/850x200'); background-size: cover; background-position: center; border-radius: 15px;">
              <div class="overlay"></div>
              <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img shadow">
              <h3 class="mt-3 text-white">John Doe</h3>
              <p class="text-white">Web Developer</p>
            </div>
      
            <!-- Profile Information -->
            <div class="container profile-info">
              <div class="card mt-4 shadow-sm rounded-lg">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4> <br>
                  <form>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control form-control-sm" id="firstName" placeholder="John">
                      </div>
                      <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control form-control-sm" id="lastName" placeholder="Doe">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" placeholder="john.doe@example.com">
                      </div>
                      <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control form-control-sm" id="phone" placeholder="(555) 555-5555">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="bio" class="form-label">Bio</label>
                      <textarea class="form-control form-control-sm" id="bio" rows="3" placeholder="Tell something about yourself..."></textarea>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-end">
                  <button type="button" class="btn btn-secondary">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </div>
      
              <div class="card mt-4 shadow-sm rounded-lg">
                <div class="card-body">
                  <h4 class="card-title">Account Settings</h4> <br>
                  <form>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm" id="username" placeholder="johndoe">
                      </div>
                      <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" placeholder="New password">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-end">
                  <button type="button" class="btn btn-secondary">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update Account</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@stop

@section('css')
<style>
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid white;
      position: absolute;
      bottom: -50px;
      left: 50%;
      transform: translateX(-50%);
    }
    .profile-header {
      padding: 60px;
      position: relative;
      border-radius: 15px;
      overflow: hidden;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1;
    }
    .profile-header h3, .profile-header p {
      position: relative;
      z-index: 2;
    }
    .profile-info {
      margin-top: 80px;
    }
    .card {
      border-radius: 10px;
    }
    .card-footer {
      background-color: #f8f9fa;
    }
    .btn {
      transition: all 0.3s ease;
    }
    .btn:hover {
      transform: scale(1.05);
    }
</style>
@stop

@section('js')
  
@stop
