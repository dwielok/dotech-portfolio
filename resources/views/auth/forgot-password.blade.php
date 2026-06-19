{{-- resources/views/auth/forgot-password.blade.php --}}
<x-guest-layout>
    {{--
        ============================================================================
        FORGOT PASSWORD PAGE - DOTECH DIGITAL STYLE (SPLIT LAYOUT)
        ============================================================================
        This forgot password page features a split layout with:
        - Hero/brand content on the left side
        - Password reset form on the right side
        - Not centered - forms are positioned to the right
        - Maintains the Dotech Digital design system styling
        ============================================================================
    --}}

    {{-- Custom Styles for this page --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            /* ===== Animations ===== */
            @keyframes pulse-slow {

                0%,
                100% {
                    opacity: 0.3;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.6;
                    transform: scale(1.05);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(-20px) translateX(10px);
                }
            }

            @keyframes float-reverse {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(15px) translateX(-10px);
                }
            }

            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fade-in-left {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes fade-in-right {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes shake {

                0%,
                100% {
                    transform: translateX(0);
                }

                10%,
                30%,
                50%,
                70%,
                90% {
                    transform: translateX(-2px);
                }

                20%,
                40%,
                60%,
                80% {
                    transform: translateX(2px);
                }
            }

            .animate-pulse-slow {
                animation: pulse-slow 4s ease-in-out infinite;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-float-reverse {
                animation: float-reverse 7s ease-in-out infinite;
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.6s ease-out forwards;
                opacity: 0;
            }

            .animate-fade-in-left {
                animation: fade-in-left 0.6s ease-out forwards;
                opacity: 0;
            }

            .animate-fade-in-right {
                animation: fade-in-right 0.6s ease-out forwards;
                opacity: 0;
            }

            .animation-delay-100 {
                animation-delay: 0.1s;
            }

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-300 {
                animation-delay: 0.3s;
            }

            .animation-delay-400 {
                animation-delay: 0.4s;
            }

            .animation-delay-500 {
                animation-delay: 0.5s;
            }

            .animation-delay-600 {
                animation-delay: 0.6s;
            }

            .animation-delay-700 {
                animation-delay: 0.7s;
            }

            /* ===== Custom Input Styles ===== */
            .reset-input {
                transition: all 0.2s ease;
            }

            .reset-input:focus {
                transform: translateY(-1px);
            }

            /* ===== Gradient Border Effect ===== */
            .gradient-border {
                position: relative;
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.02) 100%);
                backdrop-filter: blur(12px);
            }

            .gradient-border::before {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: 1.5rem;
                padding: 1px;
                background: linear-gradient(135deg, rgba(59, 130, 246, 0.5), rgba(6, 182, 212, 0.3));
                mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                pointer-events: none;
            }

            /* ===== Submit Button Animation ===== */
            .reset-submit-btn {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .reset-submit-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: left 0.5s ease;
            }

            .reset-submit-btn:hover::before {
                left: 100%;
            }

            .reset-submit-btn:active {
                transform: scale(0.98);
            }

            /* Stats Counter Animation */
            .stat-number {
                font-size: 2rem;
                font-weight: 700;
                background: linear-gradient(135deg, #3b82f6, #06b6d4);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            /* Envelope animation */
            .envelope-icon {
                animation: shake 0.5s ease-in-out;
            }
        </style>
    @endpush

    {{-- Main Container with Split Layout --}}
    <div class="relative min-h-screen flex overflow-hidden bg-gradient-to-br from-[#0A1128] via-[#1E2A5E] to-[#0A1128]">

        {{-- Animated Background Grid --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.2) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        {{-- Animated Gradient Orbs --}}
        <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/15 rounded-full blur-3xl animate-pulse-slow"
            style="animation-delay: 2s;"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-float">
        </div>

        {{-- Floating Tech Icons --}}
        <div class="absolute top-20 left-10 opacity-20 animate-float hidden xl:block">
            <i class="fab fa-react text-5xl text-blue-400"></i>
        </div>
        <div class="absolute bottom-20 right-10 opacity-20 animate-float-reverse hidden xl:block">
            <i class="fab fa-laravel text-5xl text-red-400"></i>
        </div>
        <div class="absolute top-1/3 right-20 opacity-15 animate-pulse-slow hidden xl:block">
            <i class="fas fa-code text-4xl text-cyan-400"></i>
        </div>
        <div class="absolute bottom-1/3 left-20 opacity-15 animate-float hidden xl:block">
            <i class="fas fa-database text-4xl text-green-400"></i>
        </div>

        {{-- ==================== LEFT SIDE - HERO CONTENT ==================== --}}
        <div class="hidden lg:flex lg:w-1/2 relative items-center justify-center px-12">
            <div class="max-w-lg animate-fade-in-left animation-delay-100">
                {{-- Logo --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-code text-white text-xl"></i>
                        </div>
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-white to-blue-300 bg-clip-text text-transparent">Dotech
                            Digital</span>
                    </div>
                </div>

                {{-- Main Heading --}}
                <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                    Reset Your
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                        Password
                    </span>
                </h1>

                {{-- Description --}}
                <p class="text-gray-300 text-lg leading-relaxed mb-8">
                    Don't worry! Enter your email address and we'll send you a link to reset your password securely.
                </p>

                {{-- Stats Section --}}
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="border-l-2 border-blue-500 pl-4">
                        <div class="stat-number text-3xl font-bold">150+</div>
                        <p class="text-gray-400 text-sm">Happy Clients</p>
                    </div>
                    <div class="border-l-2 border-cyan-500 pl-4">
                        <div class="stat-number text-3xl font-bold">250+</div>
                        <p class="text-gray-400 text-sm">Projects Completed</p>
                    </div>
                    <div class="border-l-2 border-blue-500 pl-4">
                        <div class="stat-number text-3xl font-bold">8+</div>
                        <p class="text-gray-400 text-sm">Years Experience</p>
                    </div>
                    <div class="border-l-2 border-cyan-500 pl-4">
                        <div class="stat-number text-3xl font-bold">24/7</div>
                        <p class="text-gray-400 text-sm">Support Ready</p>
                    </div>
                </div>

                {{-- Trust Badges --}}
                <div class="flex flex-wrap gap-4 pt-4 border-t border-white/10">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-shield-alt text-green-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">Secure Platform</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-lock text-blue-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">Data Protection</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-headset text-purple-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">Premium Support</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- ==================== RIGHT SIDE - PASSWORD RESET FORM ==================== --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
            <div class="relative w-full max-w-md">

                {{-- Back to Login Link --}}
                <div class="mb-6 animate-fade-in-right animation-delay-200">
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition-colors group text-sm">
                        <i class="fas fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                        <span>Back to Login</span>
                    </a>
                </div>

                {{-- Main Reset Password Card --}}
                <div
                    class="gradient-border rounded-2xl shadow-2xl overflow-hidden animate-fade-in-right animation-delay-300">
                    <div class="bg-white/5 backdrop-blur-sm p-6 sm:p-8">

                        {{-- Header Section --}}
                        <div class="text-center mb-8">
                            {{-- Icon for mobile --}}
                            <div class="flex justify-center mb-4">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-key text-blue-400 text-2xl"></i>
                                </div>
                            </div>

                            {{-- Title --}}
                            <h2 class="text-2xl font-bold text-white mb-2">Forgot Password?</h2>
                            <p class="text-gray-400 text-sm">No worries, we'll send you reset instructions</p>

                            {{-- Decorative Line --}}
                            <div
                                class="w-16 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 mx-auto mt-4 rounded-full">
                            </div>
                        </div>

                        {{-- Info Message --}}
                        <div
                            class="mb-6 p-3 rounded-lg bg-blue-500/10 border border-blue-500/30 text-blue-300 text-sm flex items-start gap-2">
                            <i class="fas fa-info-circle text-blue-400 mt-0.5"></i>
                            <span>Enter your email address and we'll send you a password reset link.</span>
                        </div>

                        {{-- Session Status (Success message) --}}
                        @if (session('status'))
                            <div
                                class="mb-6 p-3 rounded-lg bg-green-500/10 border border-green-500/30 text-green-400 text-sm flex items-center gap-2">
                                <i class="fas fa-check-circle text-green-400"></i>
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        {{-- Error Messages --}}
                        @if ($errors->any())
                            <div
                                class="mb-6 p-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm flex items-start gap-2">
                                <i class="fas fa-exclamation-triangle text-red-400 mt-0.5"></i>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Password Reset Form --}}
                        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                            @csrf

                            {{-- Email Address Field --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                                    <i class="fas fa-envelope text-blue-400 text-xs mr-1"></i>
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-500 text-sm"></i>
                                    </div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                                        required autofocus
                                        class="reset-input w-full pl-10 pr-3 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all"
                                        placeholder="you@example.com">
                                </div>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-400 flex items-center gap-1">
                                        <i class="fas fa-circle-exclamation text-[10px]"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <div>
                                <button type="submit"
                                    class="reset-submit-btn w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-blue-500/25 flex items-center justify-center gap-2 group">
                                    <i
                                        class="fas fa-paper-plane text-sm group-hover:translate-x-0.5 transition-transform"></i>
                                    <span>Send Reset Link</span>
                                    <i
                                        class="fas fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
                                </button>
                            </div>
                        </form>

                        {{-- Help Text --}}
                        <div class="mt-6 pt-4 border-t border-white/10 text-center">
                            <p class="text-xs text-gray-500 flex items-center justify-center gap-1">
                                <i class="fas fa-clock text-blue-400 text-[10px]"></i>
                                Link expires in 60 minutes
                            </p>
                        </div>

                        {{-- Remember Password Link --}}
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-400">
                                Remember your password?
                                <a href="{{ route('login') }}"
                                    class="text-blue-400 hover:text-blue-300 font-medium transition-colors inline-flex items-center gap-1">
                                    Back to Login
                                    <i class="fas fa-chevron-right text-[10px]"></i>
                                </a>
                            </p>
                        </div>

                        {{-- Contact Support --}}
                        <div class="mt-4 text-center">
                            <p class="text-xs text-gray-500">
                                Need help?
                                <a href="{{ route('contact') }}"
                                    class="text-blue-400 hover:text-blue-300 transition-colors">
                                    Contact Support
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Footer Text --}}
                <div class="mt-6 text-center text-xs text-gray-500">
                    <p>© {{ date('Y') }} Hevi Digital Solution Solution. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Small Back to Top Button --}}
    <button id="backToTop"
        class="fixed bottom-6 right-6 w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full shadow-lg flex items-center justify-center text-white transition-all duration-300 opacity-0 invisible hover:scale-110 z-40">
        <i class="fas fa-arrow-up text-sm"></i>
    </button>

    @push('scripts')
        <script>
            // Back to Top Button functionality
            document.addEventListener('DOMContentLoaded', function() {
                const backToTopBtn = document.getElementById('backToTop');

                if (backToTopBtn) {
                    window.addEventListener('scroll', function() {
                        if (window.scrollY > 300) {
                            backToTopBtn.classList.add('show');
                        } else {
                            backToTopBtn.classList.remove('show');
                        }
                    });

                    backToTopBtn.addEventListener('click', function() {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    });
                }
            });
        </script>
    @endpush

    {{-- Additional style for back to top button visibility --}}
    <style>
        #backToTop.show {
            opacity: 1;
            visibility: visible;
        }

        #backToTop {
            cursor: pointer;
        }
    </style>
</x-guest-layout>
