@extends('layout/template')
@section('title')
Profile
@endsection
@section('content')
<div class="profile-section spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-user mr-1"></i>Profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <span class="col-sm-5">First Name</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->name}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Last Name</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->lastname}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Email</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->email}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Address</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->address1}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Address line 2</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->address2}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">City</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->city}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Province</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->province}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Country</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->country}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Zip Code</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->zipcode}}</span>
                        </div>
                        <div class="row">
                            <span class="col-sm-5">Phone</span>
                            <span class="col-sm-1 font-weight-bold">:</span>
                            <span class="col-sm-6">{{$user->phone}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-edit mr-1"></i>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputName" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}">
                                </div>
                                @error('lastname')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                                </div>
                                @error('email')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress1" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-6">
                                    <textarea type="text" class="form-control @error('address1') is-invalid @enderror" name="address1" value="{{$user->address1}}"></textarea>
                                </div>
                                @error('address1')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress2" class="col-sm-3 col-form-label">Address line 2</label>
                                <div class="col-sm-6">
                                    <textarea type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{$user->address2}}"></textarea>
                                </div>
                                @error('address2')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputCity" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$user->city}}">
                                </div>
                                @error('city')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputProvince" class="col-sm-3 col-form-label">Province</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{$user->province}}">
                                </div>
                                @error('province')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{$user->country}}">
                                </div>
                                @error('country')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputZipCode" class="col-sm-3 col-form-label">Zip Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{$user->zipcode}}">
                                </div>
                                @error('zipcode')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger col-sm-4">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm">
                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection