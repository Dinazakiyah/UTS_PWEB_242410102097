@extends('layouts.app')

@section('title', 'Login - Portal Berita')

@section('content')
<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7">
                <div class="login-card">
                    <div class="login-header">
                        <div class="login-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h3 class="login-title">Portal Berita Indonesia</h3>
                        <p class="login-subtitle">Silakan login untuk melanjutkan</p>
                    </div>


                    @if(session('error'))
                        <div class="alert alert-danger alert-custom" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <span>{{ session('error') }}</span>
                            <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
                        </div>
                    @endif


                    @if(session('success'))
                        <div class="alert alert-success alert-custom" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>{{ session('success') }}</span>
                            <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
                        </div>
                    @endif


                    <form action="{{ route('login.process') }}" method="POST" class="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope-fill"></i> Email
                            </label>
                            <input type="email"
                                   class="form-control form-control-custom"
                                   id="email"
                                   name="email"
                                   placeholder="Masukkan email Anda"
                                   required
                                   autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock-fill"></i> Password
                            </label>
                            <input type="password"
                                   class="form-control form-control-custom"
                                   id="password"
                                   name="password"
                                   placeholder="Masukkan password Anda"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Masuk ke Dashboard</span>
                        </button>
                    </form>


                    <div class="login-info">
                        <div class="info-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <p>Gunakan username dan password apapun untuk login</p>
                        </div>
                    </div>
                </div>

                <div class="login-footer">
                    <p>&copy; 2025 Portal Berita Indonesia - kelompok 6</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-css')
<style>
    .login-wrapper {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        position: relative;
        overflow: hidden;
    }

    .login-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: pulse 15s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }

    .login-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    .login-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .login-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 8px 20px rgba(30, 58, 138, 0.3);
    }

    .login-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .login-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .login-subtitle {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .alert-custom {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: none;
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .alert-custom i {
        font-size: 1.25rem;
    }

    .alert-custom span {
        flex-grow: 1;
    }

    .login-form {
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .form-label i {
        color: #6b7280;
    }

    .form-control-custom {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.875rem 1.125rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .form-control-custom:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        background: white;
        outline: none;
    }

    .form-control-custom::placeholder {
        color: #9ca3af;
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 1rem;
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 58, 138, 0.4);
        background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .login-info {
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
    }

    .info-box {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 12px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .info-box i {
        color: #3b82f6;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .info-box p {
        color: #1e40af;
        font-size: 0.875rem;
        margin-bottom: 0;
        line-height: 1.5;
    }

    .login-footer {
        text-align: center;
        margin-top: 1.5rem;
    }

    .login-footer p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        margin-bottom: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .login-card {
            padding: 2rem 1.5rem;
            border-radius: 16px;
        }

        .login-icon {
            width: 70px;
            height: 70px;
        }

        .login-icon i {
            font-size: 2rem;
        }

        .login-title {
            font-size: 1.5rem;
        }

        .form-control-custom {
            padding: 0.75rem 1rem;
        }

        .btn-login {
            padding: 0.875rem;
        }
    }
</style>
@endsection
