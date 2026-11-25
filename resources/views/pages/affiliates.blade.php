@extends('layouts.app')

@section('meta')
    <title>Affiliate Program | Visioforge</title>
    <meta name="description" content="Join the Visioforge affiliate program. Share your link and earn up to 50% of the order amount from referred customers.">
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/affiliates.css') }}">
    <main class="affiliates">
        <section class="af-hero">
            <div class="af-wrap af-grid">
                <div>
                    <span class="af-eyebrow">{{ __('Visioforge affiliate program') }}</span>
                    <h1>{{ __('Turn great recommendations into') }} <em>{{ __('a rewarding partnership.') }}</em></h1>
                    <p class="af-lead">{{ __('Introduce your audience to smarter agreements, better emails, and inspiring images. Earn up to 50% of the order amount when people you refer make a purchase.') }}</p>
                    <div class="af-actions">
                        <a class="af-button" href="{{ route('register') }}">{{ __('Become a partner') }}</a>
                        <a class="af-text-link" href="#how-it-works">{{ __('How it works') }}</a>
                    </div>
                    <p class="af-note">{{ __('For creators, publishers, and people with something to share.') }}</p>
                </div>
                <div class="af-art">
                    <div class="af-rate">
                        <div class="af-rate-top"><span>{{ __('A share in every order') }}</span><span class="af-symbol" aria-hidden="true">✳</span></div>
                        <div class="af-number">50<span>%</span></div>
                        <p>{{ __('Earn up to 50% of the order amount') }}</p>
                        <div class="af-path"><span>{{ __('Your link') }}</span><b aria-hidden="true"></b><span>{{ __('Their order') }}</span><b aria-hidden="true"></b><span>{{ __('Your reward') }}</span></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="af-strip"><div class="af-wrap"><span>{{ __('Good things are worth sharing') }}</span><strong>{{ __('AI agreements') }}</strong><strong>{{ __('Professional emails') }}</strong><strong>{{ __('Stock images') }}</strong></div></div>
        <section class="af-section" id="how-it-works">
            <div class="af-wrap">
                <span class="af-eyebrow">{{ __('Simple from the start') }}</span>
                <h2>{{ __('One link. Three simple steps.') }}</h2>
                <p class="af-intro">{{ __('You make the introduction. We provide the tools your audience can use to bring their ideas to life.') }}</p>
                <div class="af-steps">
                    <article class="af-step"><div class="af-step-label">{{ __('Join the program') }}</div><h3>{{ __('Create your account') }}</h3><p>{{ __('Register with Visioforge to take the first step toward becoming an affiliate partner.') }}</p></article>
                    <article class="af-step"><div class="af-step-label">{{ __('Make it yours') }}</div><h3>{{ __('Get your affiliate link') }}</h3><p>{{ __('Use your personal referral link to introduce Visioforge to your audience, community, or clients.') }}</p></article>
                    <article class="af-step"><div class="af-step-label">{{ __('Grow together') }}</div><h3>{{ __('Share and earn up to 50%') }}</h3><p>{{ __('When someone follows your link and places an order, you can earn up to 50% of the order amount.') }}</p></article>
                </div>
            </div>
        </section>
        <section aria-label="{{ __('Who can join') }}"><div class="af-wrap"><div class="af-audience">
            <div><span class="af-eyebrow">{{ __('Made for your community') }}</span><h2>{{ __('A natural fit for people who connect people.') }}</h2><p>{{ __('Share useful tools in your own voice, wherever your audience comes to you for ideas and recommendations.') }}</p></div>
            <div class="af-tags"><span>{{ __('Content creators') }}</span><span>{{ __('Bloggers & publishers') }}</span><span>{{ __('Creative communities') }}</span><span>{{ __('Educators') }}</span><span>{{ __('Agencies & freelancers') }}</span></div>
        </div></div></section>
        <section class="af-section"><div class="af-wrap af-faq">
            <span class="af-eyebrow">{{ __('A few things to know') }}</span><h2>{{ __('Before you get started') }}</h2>
            <details><summary>{{ __('How much can I earn?') }}</summary><p>{{ __('You can earn up to 50% of the order amount from customers you refer. Contact our team to discuss the commission rate and terms for your partnership.') }}</p></details>
            <details><summary>{{ __('Where can I share my link?') }}</summary><p>{{ __('Introduce Visioforge through relevant content on your website, social channels, newsletter, or community. Choose the places where your recommendations are useful to your audience.') }}</p></details>
            <details><summary>{{ __('How do I get my affiliate link?') }}</summary><p>{{ __('Start by registering an account. Contact our team below for help with joining the program and getting your personal affiliate link.') }}</p></details>
        </div></section>
        <section class="af-contact" id="contact">
            <div class="af-wrap af-grid">
                <div><span class="af-eyebrow">{{ __('Let’s work together') }}</span><h2>{{ __('Great partnerships start with a conversation.') }}</h2><p>{{ __('Have a question about the affiliate program? Tell us a little about yourself and your audience. Our team will help you get started.') }}</p><a class="af-text-link" href="{{ route('register') }}">{{ __('Ready to join? Create an account') }}</a></div>
                <form class="af-form" action="{{ route('contact.store') }}" method="POST" data-affiliate-contact data-sending="{{ __('Sending…') }}" data-submit="{{ __('Send message') }}" data-error="{{ __('We couldn’t send your message. Please try again.') }}">
                    @csrf
                    <label for="affiliate-name">{{ __('Your name') }}</label><input id="affiliate-name" name="name" autocomplete="name" placeholder="{{ __('How should we call you?') }}" maxlength="255" required>
                    <label for="affiliate-email">{{ __('Email address') }}</label><input id="affiliate-email" name="email" type="email" autocomplete="email" placeholder="you@example.com" maxlength="255" required>
                    <label for="affiliate-message">{{ __('Tell us about your plans') }}</label><textarea id="affiliate-message" name="message" placeholder="{{ __('Your audience, your channels, or anything you’d like to ask…') }}" maxlength="1000" required></textarea>
                    <button class="af-button" type="submit">{{ __('Send message') }}</button>
                    <p class="af-status" role="status" aria-live="polite"></p>
                </form>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/affiliates.js') }}" defer></script>
@endpush
