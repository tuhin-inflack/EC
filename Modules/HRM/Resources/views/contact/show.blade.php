@extends('hrm::layouts.master')
@section('title', 'Contact')
@push('page-css')
@endpush
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-colored-form-control">Contact Information</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="card-text">
                        <p>
                            <!-- Basic Card Information -->
                        </p>
                    </div>
                    <form class="form">
                        <div class="form-body">
                            <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput1">Fist Name</label>
                                        <input type="text" id="userinput1" class="form-control border-primary"
                                               placeholder="Name"
                                               name="name" value="Mohammad">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput2">Last Name</label>
                                        <input type="text" id="userinput2" class="form-control border-primary"
                                               placeholder="Company"
                                               name="company" value="Imran Hossain">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput3">Username</label>
                                        <input type="text" id="userinput3" class="form-control border-primary"
                                               placeholder="Username"
                                               name="username" value="imran16">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userinput4">Nick Name</label>
                                        <input type="text" id="userinput4" class="form-control border-primary"
                                               placeholder="Nick Name"
                                               name="nickname" value="imran">
                                    </div>
                                </div>
                            </div>
                            <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput5">Interested in</label>
                                        <select id="projectinput5" name="interested"
                                                class="form-control border-primary">
                                            <option value="none" selected="" disabled="">Interested in</option>
                                            <option value="design">design</option>
                                            <option value="development">development</option>
                                            <option value="illustration">illustration</option>
                                            <option value="branding">branding</option>
                                            <option value="video">video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput6">Type</label>
                                        <select id="projectinput6" name="budget" class="form-control border-primary">
                                            <option value="0" selected="" disabled="">Client</option>
                                            <option value="less than 5000$">Vendor</option>
                                            <option value="5000$ - 10000$">Supplier</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="userinput5">Email</label>
                                <input class="form-control border-primary" type="email" placeholder="email"
                                       id="userinput5" value="imranhossain16.ctg@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="userinput6">Website</label>
                                <input class="form-control border-primary" type="url" placeholder="http://"
                                       id="userinput6" value="website.com">
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input class="form-control border-primary" id="userinput7" type="tel"
                                       placeholder="Contact Number" value="01XXXYYYZZZ">
                            </div>
                            <div class="form-group">
                                <label for="userinput8">Bio</label>
                                <textarea id="userinput8" rows="5" class="form-control border-primary" name="bio"
                                          placeholder="Bio">Imran Hossain</textarea>
                            </div>
                        </div>
                        <div class="form-actions right">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')


@endpush