@extends('layouts.app')

@section('meta')
    <title>Affiliate Program | Visioforge</title>
    <meta name="description" content="Join the Visioforge affiliate program. Share your link and earn up to 50% of the order amount from referred customers.">
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/affiliates.css') }}">
    <main class="affiliates">
        <section class="af-hero">
            <div class="af-wrap af-hero-layout">
                <div class="af-hero-copy">
                    <span class="af-eyebrow">{{ __('The Visioforge partner program') }}</span>
                    <h1>{{ __('Good recommendations.') }} <em>{{ __('Great possibilities.') }}</em></h1>
                    <p class="af-lead">{{ __('Help your audience work a little smarter. Introduce them to AI agreements, professional emails, and inspiring stock images — and earn when they order.') }}</p>
                    <div class="af-actions"><a class="af-button" href="#contact">{{ __('Become a partner') }}</a><a class="af-text-link" href="#how-it-works">{{ __('Explore the program') }}</a></div>
                    <p class="af-note">{{ __('Your audience. Your voice. A partnership that fits.') }}</p>
                </div>
                <div class="af-visual">
                    <div class="af-workspace" aria-hidden="true">
                        <div class="af-workspace-top"><span>VISIOFORGE</span><span>THE EVERYDAY TOOLKIT</span></div>
                        <div class="af-document"><span class="af-paper-icon">✧</span><span class="af-paper-tag">AGREEMENTS</span><strong>A good idea.<br>A clear agreement.</strong><i></i><i></i><i></i><span class="af-signature">Make it official.</span></div>
                        <div class="af-mail"><span>✉</span><div><small>PROFESSIONAL EMAILS</small><strong>The right words.<br>Ready to send.</strong></div></div>
                        <div class="af-image"><span>STOCK IMAGES</span><div class="af-landscape"></div></div>
                    </div>
                    <div class="af-commission"><div><span class="af-eyebrow">{{ __('A rewarding introduction') }}</span><p>{{ __('of the order amount from customers you refer') }}</p></div><strong><small>{{ __('Up to') }}</small>50<span>%</span></strong></div>
                </div>
            </div>
        </section>
        <section class="af-section" id="how-it-works">
            <div class="af-wrap">
                <div class="af-section-heading"><h2>{{ __('A simple way to') }}<br>{{ __('build something together.') }}</h2><p>{{ __('You make the introduction. We provide useful tools your audience can make part of their everyday work.') }}</p></div>
                <div class="af-steps">
                    <article><span class="af-step-icon" aria-hidden="true">＋</span><h3>{{ __('Make the connection') }}</h3><p>{{ __('Register with Visioforge and contact our team to get started as an affiliate partner.') }}</p></article>
                    <article><span class="af-step-icon" aria-hidden="true">↗</span><h3>{{ __('Share what is useful') }}</h3><p>{{ __('Introduce Visioforge through your personal referral link, in content your audience already comes to you for.') }}</p></article>
                    <article><span class="af-step-icon" aria-hidden="true">✧</span><h3>{{ __('Grow your partnership') }}</h3><p>{{ __('When someone you refer places an order, you can earn up to 50% of the order amount.') }}</p></article>
                </div>
            </div>
        </section>
        <section class="af-audience"><div class="af-wrap af-audience-layout"><div><span class="af-eyebrow">{{ __('Built around your influence') }}</span><h2>{{ __('Useful to them.') }}<br><em>{{ __('Rewarding for you.') }}</em></h2></div><div class="af-audience-list"><p><strong>{{ __('Publishers & educators') }}</strong><span>{{ __('Bring practical tools into your articles, newsletters, and lessons.') }}</span></p><p><strong>{{ __('Creators & communities') }}</strong><span>{{ __('Share a recommendation that fits naturally into the conversation.') }}</span></p><p><strong>{{ __('Agencies & freelancers') }}</strong><span>{{ __('Introduce helpful resources to your network and clients.') }}</span></p></div></div></section>
        <section class="af-section"><div class="af-wrap af-faq-layout"><div><span class="af-eyebrow">{{ __('The finer details') }}</span><h2>{{ __('A few things') }}<br>{{ __('worth knowing.') }}</h2><a class="af-text-link" href="#contact">{{ __('Ask us a question') }}</a></div><div class="af-faq">            <details><summary>{{ __('How much can I earn?') }}</summary><p>{{ __('You can earn up to 50% of the order amount from customers you refer. Contact our team to discuss the commission rate and terms for your partnership.') }}</p></details>
            <details><summary>{{ __('Where can I share my link?') }}</summary><p>{{ __('Introduce Visioforge through relevant content on your website, social channels, newsletter, or community. Choose the places where your recommendations are useful to your audience.') }}</p></details>
            <details><summary>{{ __('How do I get my affiliate link?') }}</summary><p>{{ __('Start by registering an account. Contact our team below for help with joining the program and getting your personal affiliate link.') }}</p></details>
</div></div></section>
        <section class="af-contact" id="contact"><div class="af-wrap af-contact-layout"><div><span class="af-eyebrow">{{ __('Let’s work together') }}</span><h2>{{ __('The start of a') }}<br>{{ __('good partnership.') }}</h2><p>{{ __('Tell us about your audience and what you have in mind. Our team will help you take the next step.') }}</p><a class="af-text-link" href="{{ route('register') }}">{{ __('Ready to join? Create an account') }}</a></div>                <form class="af-form" action="{{ route('contact.store') }}" method="POST" data-affiliate-contact data-sending="{{ __('Sending…') }}" data-submit="{{ __('Send message') }}" data-error="{{ __('We couldn’t send your message. Please try again.') }}">
                    @csrf
                    <label for="affiliate-name">{{ __('Your name') }}</label><input id="affiliate-name" name="name" autocomplete="name" placeholder="{{ __('How should we call you?') }}" maxlength="255" required>
                    <label for="affiliate-email">{{ __('Email address') }}</label><input id="affiliate-email" name="email" type="email" autocomplete="email" placeholder="you@example.com" maxlength="255" required>
                    <label for="affiliate-message">{{ __('Tell us about your plans') }}</label><textarea id="affiliate-message" name="message" placeholder="{{ __('Your audience, your channels, or anything you’d like to ask…') }}" maxlength="1000" required></textarea>
                    <button class="af-button" type="submit">{{ __('Send message') }}</button>
                    <p class="af-status" role="status" aria-live="polite"></p>
                </form></div></section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/affiliates.js') }}" defer></script>
@endpush
