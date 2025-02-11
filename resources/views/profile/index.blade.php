@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-wrapper">
						<div class="row"><br>
							<div class="col-md-3 col-sm-4">
								<center>
									<br>
									<img src="https://cdn-icons-png.flaticon.com/512/3364/3364044.png" class="img-circle img-responsive" width="120px" height="120px">
								</center>
							</div>
							<div class="col-md-9 col-sm-8">
								<h3 class="profile-name" style="color: black">{{ Auth::user()->name }}</h3>
								<p>Admin</p>
								<br>
								<span class="profile-data"><i class="far fa-envelope-open"></i> {{ Auth::user()->email }}</span><br><br>
								<span class="profile-data">Created on: {{ Auth::user()->created_at->format('F j, Y') }}</span><br><br>
								<br>
								<a href="{{ route('profile.edit') }}" class="primary-btn">Edit profile</a>
							</div>
						</div><br>
						<br>
					</div>
				</div>
			</div>
@endsection
