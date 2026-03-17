@extends('layouts.dashboard')

@section('title', 'Account | IL² RMUTTO')

@push('styles')
<style>


        

        

        /* ─── MAIN LAYOUT ─── */

        /* ─── CONTENT AREA ─── */
        .content-

        .content-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #1a202c;
        }

        .account-card {
            background: var(--white);
            border-radius: 24px;
            padding: 50px 60px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            min-height: 700px;
        }

        /* ─── AVATAR ─── */
        .avatar-section {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 45px;
        }

        .avatar-lg {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .edit-btn {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* ─── FORM ─── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px 40px;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 700;
            color: #1a202c;
        }

        .form-group label span {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-group input, 
        .form-group select {
            height: 52px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 18px;
            font-size: 14px;
            color: #4a5568;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: #3b82f6;
        }

        .btn-navy {
            height: 44px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .btn-update {
            margin-top: 50px;
            height: 52px;
            width: 220px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-update:hover {
            opacity: 0.9;
        }

        /* ─── FOOTER ─── */
        footer {
            grid-column: 2; border-radius: 26px; box-sizing: border-box;
            background: #fff; padding: 60px 30px; border-top: 1px solid #f1f5f9;
            display: flex; justify-content: space-between; gap: 40px; flex-wrap: wrap; margin-top: 10px;
        }
        .f-brand { flex: 1; min-width: 250px; }
        .f-logo-circle { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
        .f-logo-circle img { height: 35px; }
        .f-brand p { color: #64748b; font-size: 14.5px; line-height: 1.6; }
        .f-col { flex: 0.6; min-width: 150px; }
        .f-col ul { list-style: none; padding: 0; margin: 0; }
        .f-col ul li { margin-bottom: 15px; }
        .f-col ul li a { text-decoration: none; color: #475569; font-size: 14.5px; transition: 0.2s; }
        .f-col ul li a:hover { color: var(--primary); }
        .f-right { flex: 1; min-width: 250px; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .f-lang-select { 
            padding: 10px 15px; border-radius: 25px; border: 1px solid #e2e8f0; background: #fff; 
            color: #475569; font-size: 14px; outline: none; cursor: pointer; width: 140px;
        }
        .f-socials { display: flex; gap: 12px; }
        .f-socials a { 
            width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; 
            display: flex; align-items: center; justify-content: center; transition: 0.2s; 
        }
        .f-socials a:hover { transform: translateY(-3px); background: #e2e8f0; }
        .f-socials a img { height: 18px; width: 18px; object-fit: contain; }
        .f-apps { display: flex; gap: 10px; }
        .f-apps a img { height: 38px; }

        @media (max-width: 1024px) {
            footer {
                grid-template-columns: 1fr 1fr;
                padding: 40px 20px;
            }
            .footer-right {
                align-items: flex-start;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
</style>
@endpush

@section('dashboard-content')
@if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    
    

    <div class="dashboard-page-content">
        <!-- Sidebar -->
        

        <!-- Main Content -->
        <main class="content">
            <div class="content-header">
                <h1>My Account</h1>
            </div>

            <div class="account-card">
                <!-- Avatar -->
                <div class="avatar-section">
                    <div class="avatar-lg"></div>
                    <button class="edit-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Full Name<span>*</span></label>
                            <input type="text" name="name" value="{{ $user->name ?? 'Student' }}">
                        </div>
                        <div class="form-group">
                            <label>Username<span>*</span></label>
                            <input type="text" name="username" value="{{ $user->username ?? '@Student2' }}">
                        </div>

                        <div class="form-group">
                            <label>Current Password<span>*</span></label>
                            <input type="password" name="current_password" value="••••••••">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('password.change') }}" class="btn-navy">Change</a>
                        </div>

                        <div class="form-group">
                            <label>Old Password<span>*</span></label>
                            <input type="password" name="old_password" placeholder="Enter old password">
                        </div>
                        <div class="form-group">
                            <label>New Password<span>*</span></label>
                            <input type="password" name="new_password" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" value="{{ $user->email ?? '123@gmail.com' }}">
                        </div>
                        <div class="form-group">
                            <label>Date of birth<span>*</span></label>
                            <input type="text" name="dob" value="{{ $user->dob ?? 'Teacher' }}">
                        </div>

                        <div class="form-group">
                            <label>Phone No<span>*</span></label>
                            <input type="tel" name="phone" value="{{ $user->phone ?? '000-0000 0000' }}">
                        </div>
                        <div class="form-group">
                            <label>Country<span>*</span></label>
                            <select name="country">
                                <option @if(($user->country ?? 'Malaysia') == 'Malaysia') selected @endif>Malaysia</option>
                                <option @if(($user->country ?? '') == 'Thailand') selected @endif>Thailand</option>
                                <option @if(($user->country ?? '') == 'Singapore') selected @endif>Singapore</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-update">Update</button>
                </form>

                <form id="password-form" action="{{ route('account.password') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </main>

        <!-- Footer -->
        
    </div>
@endsection
