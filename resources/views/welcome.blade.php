<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'EasyColoc') }} – Shared Living, Simplified</title>
    <meta name="description"
        content="The modern platform for roommates to track expenses, settle debts, and maintain financial transparency effortlessly.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/welcome.css', 'resources/js/app.js'])
 

</head>

<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <span class="logo-mark">EasyColoc</span>
            <div class="nav-links">
                <a href="{{ route('login') }}" class="nav-btn nav-btn-ghost">Sign in</a>
                <a href="{{ route('register') }}" class="nav-btn nav-btn-primary">Get Started →</a>
            </div>
        </div>
    </nav>

    <div class="bg-mesh">


        <section class="hero">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>

            <div class="badge-pill">
                <span class="badge-dot"></span>
                Now in public beta
            </div>

            <h1 class="hero-title">
                Shared living,<br>
                <span class="gradient-text">finally simple.</span>
            </h1>

            <p class="hero-sub">
                EasyColoc lets roommates track expenses, settle debts instantly,
                and stay financially transparent — all in one beautiful dashboard.
            </p>

            <div class="hero-cta">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2"
                        viewBox="0 0 24 24">
                        <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Start for free
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline">Sign in →</a>
            </div>


            <div class="hero-preview">
                <div class="preview-header">
                    <span class="preview-dot" style="background:#ef4444;"></span>
                    <span class="preview-dot" style="background:#fbbf24;"></span>
                    <span class="preview-dot" style="background:#22c55e;"></span>
                    <span class="preview-title">EasyColoc — Colocation overview</span>
                </div>
                <div class="preview-row">
                    <span>🛒 Groceries – Ali</span>
                    <span class="preview-badge badge-green">Settled</span>
                    <span class="preview-amount positive">+€24.50</span>
                </div>
                <div class="preview-row">
                    <span>⚡ Electricity – Sara</span>
                    <span class="preview-badge badge-red">Pending</span>
                    <span class="preview-amount negative">-€38.00</span>
                </div>
                <div class="preview-row">
                    <span>🌐 Internet – You</span>
                    <span class="preview-badge badge-yellow">Due soon</span>
                    <span class="preview-amount" style="color:#fbbf24;">€15.00</span>
                </div>
            </div>
        </section>

        <section class="section">
            <div style="max-width:680px; margin-bottom:3rem;">
                <span class="section-label">Features</span>
                <div class="section-divider"></div>
                <h2 class="section-title">Everything your colocation needs</h2>
                <p class="section-desc">From tracking the first grocery run to settling the last utility bill —
                    EasyColoc handles it all.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card" style="--card-glow: rgba(99,102,241,.12);">
                    <div class="feature-icon icon-indigo">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="feature-title">Track Expenses</div>
                    <div class="feature-desc">Quickly log shared costs with categories, amounts, and who paid — in just
                        a few taps.</div>
                </div>

                <div class="feature-card" style="--card-glow: rgba(16,185,129,.12);">
                    <div class="feature-icon icon-emerald">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="feature-title">Smart Settlements</div>
                    <div class="feature-desc">Automatically calculates who owes whom and by how much, minimising
                        unnecessary transfers.</div>
                </div>

                <div class="feature-card" style="--card-glow: rgba(139,92,246,.12);">
                    <div class="feature-icon icon-purple">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="feature-title">Member Management</div>
                    <div class="feature-desc">Invite roommates via a link, assign admin roles, and manage the household
                        in one place.</div>
                </div>

                <div class="feature-card" style="--card-glow: rgba(244,63,94,.12);">
                    <div class="feature-icon icon-rose">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div class="feature-title">Real-time Alerts</div>
                    <div class="feature-desc">Get notified when a new expense is added, a payment is confirmed, or a
                        balance changes.</div>
                </div>

                <div class="feature-card" style="--card-glow: rgba(245,158,11,.12);">
                    <div class="feature-icon icon-amber">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="feature-title">Analytics Dashboard</div>
                    <div class="feature-desc">Visualise spending trends by category and time — understand where your
                        money goes each month.</div>
                </div>

                <div class="feature-card" style="--card-glow: rgba(14,165,233,.12);">
                    <div class="feature-icon icon-sky">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="feature-title">Secure & Private</div>
                    <div class="feature-desc">Your financial data is encrypted and never shared with third parties. Full
                        privacy, always.</div>
                </div>
            </div>
        </section>

        {{-- ──────────── Stats ──────────── --}}
        <section class="section" style="padding-top: 0;">
            <div class="stats-strip">
                <div class="stat-item">
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Active users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">45+</div>
                    <div class="stat-label">Colocations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">3,200+</div>
                    <div class="stat-label">Expenses tracked</div>
                </div>
            </div>
        </section>


        <section class="section" style="padding-top: 0;">
            <div style="max-width: 680px; margin-bottom: 3rem;">
                <span class="section-label">How it works</span>
                <div class="section-divider"></div>
                <h2 class="section-title">Up and running in minutes</h2>
                <p class="section-desc">No complicated setup. Just create a colocation, invite your roommates, and start
                    tracking.</p>
            </div>

            <div class="steps-grid">
                <div class="step-item">
                    <div class="step-num">1</div>
                    <div class="step-title">Create your colocation</div>
                    <div class="step-desc">Sign up for free and set up your shared household with a name and description
                        in under 30 seconds.</div>
                </div>
                <div class="step-item">
                    <div class="step-num">2</div>
                    <div class="step-title">Invite your roommates</div>
                    <div class="step-desc">Share a magic invite link. Roommates join instantly and can start logging
                        expenses right away.</div>
                </div>
                <div class="step-item">
                    <div class="step-num">3</div>
                    <div class="step-title">Log shared expenses</div>
                    <div class="step-desc">Add costs as they happen — groceries, rent, utilities. EasyColoc splits
                        everything automatically.</div>
                </div>
                <div class="step-item">
                    <div class="step-num">4</div>
                    <div class="step-title">Settle with one click</div>
                    <div class="step-desc">View a clear balance summary and mark debts as settled when money changes
                        hands. Done.</div>
                </div>
            </div>
        </section>


        <section class="section" style="padding-top: 0;">
            <div class="cta-section">
                <span class="section-label">Join for free</span>
                <h2 class="section-title">Ready to simplify<br>shared expenses?</h2>
                <p class="section-desc">
                    Join roommates who trust EasyColoc to keep their finances fair and transparent.
                </p>
                <a href="{{ route('register') }}" class="btn btn-primary"
                    style="font-size:1.05rem; padding:.95rem 2.4rem;">
                    Create your free account →
                </a>
                <p style="margin-top:1rem; font-size:.82rem; color:rgba(232,234,246,.35);">No credit card required ·
                    Cancel anytime</p>
            </div>
        </section>

        <footer class="footer">
            <div class="footer-inner">
                <div class="footer-logo">EasyColoc</div>
                <div class="footer-copy">&copy; {{ now()->year }} EasyColoc. All rights reserved.</div>
            </div>
        </footer>

    </div>

    <x-magic-badge />

</body>

</html>