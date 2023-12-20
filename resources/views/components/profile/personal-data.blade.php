<div id="personalDataActive" class="tab-content">
    <div class="border rounded p-4">
        <p class="fs-5 mb-3"><strong>Personal Data</strong></p>
        <div class="nav">
            <div class="nav-item me-4 cursor-pointer" onclick="toggleActiveProfile('accInfo')">
                <span id="accInfoText" style="color:#5E5946;">Account Information</span>
                <div class="rectangle-active" id="accInfoActive"></div>
            </div>
            <div class="nav-item cursor-pointer" onclick="toggleActiveProfile('passSec')">
                <span id="passSecText">Password & Security</span>
                <div class="rectangle-active d-none" id="passSecActive"></div>
            </div>
        </div>
        <div id="accInfoContent" class="py-4">
            <form action="">
                @csrf
                <div class="mb-3">
                    <label for="fnProfile" class="form-label">Full Name</label>
                    <input type="Text" class="form-control form-login py-2" id="fnProfile" placeholder="Your Name"
                        value="Jeta Nanda">
                </div>
                <div class="mb-3">
                    <label for="emailProfile" class="form-label">Email address</label>
                    <input type="email" class="form-control form-login py-2" id="emailProfile"
                        placeholder="Input Your Email" value="Jeta@gmail.com">
                </div>
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="genderProfile" class="form-label">Gender</label>
                        <select class="form-select" id="genderProfile">
                            <option value="1" selected>Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col">
                                <label for="dateProfile" class="form-label">Birthdate</label>
                                <select class="form-select" id="dateProfile">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="monthProfile" class="form-label opacity-0">month</label>
                                <select class="form-select" id="monthProfile">
                                    <option value="1" selected>January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="yearProfile" class="form-label opacity-0">year</label>
                                <select class="form-select" id="yearProfile">
                                    <option value="1" selected>2000</option>
                                    <option value="2">2023</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button class="profile-cancel-btn">
                        Cancel
                    </button>
                    <button class="profile-save-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div id="passSecContent" class="d-none py-4">
            <form action="">
                @csrf
                <div class="mb-3">
                    <label for="passwordCurrent" class="form-label">Current Password</label>
                    <input type="password" class="form-control form-login py-2" id="passwordCurrent"
                        placeholder="Min. 8 characters and include special character" value="CurrentPassword">
                </div>
                <div class="mb-3">
                    <label for="passwordNew" class="form-label">New Password</label>
                    <input type="password" class="form-control form-login py-2" id="passwordNew"
                        placeholder="Min. 8 characters and include special character">
                </div>
                <div class="mb-3">
                    <label for="passwordReNew" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control form-login py-2" id="passwordReNew"
                        placeholder="Min. 8 characters and include special character">
                </div>
                <div class="text-end">
                    <button class="profile-cancel-btn">
                        Cancel
                    </button>
                    <button class="profile-save-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
