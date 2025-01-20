@extends('businesspanel.busniesspanel')

@section('title')
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
@endsection

@section('container')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Panels</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Base</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Panels</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User details</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                            <li class="nav-item submenu" role="presentation">
                                <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Basic information</a>
                            </li>
                            <li class="nav-item submenu" role="presentation">
                                <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill" href="#line-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false"
                                    tabindex="-1">Additional information</a>
                            </li>
                            <li class="nav-item submenu" role="presentation">
                                <a class="nav-link" id="line-contact-tab" data-bs-toggle="pill" href="#line-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false"
                                    tabindex="-1">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3 mb-3" id="line-tabContent">
                            <div class="tab-pane fade active show" id="line-home" role="tabpanel"
                                aria-labelledby="line-home-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Name"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>User Type</label>
                                                <input type="text" class="form-control" id="datepicker" name="datepicker"
                                                    value="03/21/1998" placeholder="Birth Date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>User Type</label>
                                                <select class="form-select" id="gender" name="role">
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="business" {{ $user->role == 'business' ? 'selected' : '' }}>Business</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-group-default">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" value="{{ $user->mobileno }}"
                                                    name="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Address</label>
                                                <input type="text" class="form-control"
                                                    value="st Merdeka Putih, Jakarta Indonesia" name="address"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-1">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>About Me</label>
                                                <textarea class="form-control" name="about" placeholder="About Me" rows="3">A man who hates loneliness</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3 mb-3">
                                        <button class="btn btn-success">Save</button>
                                        <button class="btn btn-danger">Reset</button>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="line-profile" role="tabpanel"
                                aria-labelledby="line-profile-tab">
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                    unorthographic life One day however a small line of blind text by the name of Lorem
                                    Ipsum decided to leave for the far World of Grammar.</p>
                                <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild
                                    Question Marks and devious Semikoli, but the Little Blind Text didnÃ¢â‚¬â„¢t listen. She
                                    packed her seven versalia, put her initial into the belt and made herself on the way.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="line-contact" role="tabpanel"
                                aria-labelledby="line-contact-tab">
                                <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way
                                    she met a copy. The copy warned the Little Blind Text, that where it came from it would
                                    have been rewritten a thousand times and everything that was left from its origin would
                                    be the word "and" and the Little Blind Text should turn around and return to its own,
                                    safe country.</p>

                                <p> But nothing the copy said could convince her and so it didnÃ¢â‚¬â„¢t take long until a
                                    few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and
                                    dragged her into their agency, where they abused her for their</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
