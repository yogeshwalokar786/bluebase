@php
  $logos = $clientLogos ?? null;
  if (!$logos) {
      try {
          $logos = \App\Models\ClientLogo::active()->get();
      } catch (\Throwable $e) {
          $logos = collect();
      }
  }
  $headingText = $heading ?? ($marqueeHeading ?? 'Trusted by modern brands, ambitious startups, and fast-growing businesses worldwide');
@endphp

@if($logos && $logos->count() > 0)
<section class="marquee-section">
  @if(!empty($headingText))
    <div class="container">
      <h2 class="marquee-heading" data-viewport="true">{{ $headingText }}</h2>
    </div>
  @endif
  <div class="marquee-container">
    <div class="marquee-track">
      @foreach($logos as $client)
        <div class="marquee-item">
          @if($client->website_url)
            <a href="{{ $client->website_url }}" target="_blank" rel="noopener noreferrer">
              <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" loading="lazy">
            </a>
          @else
            <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" loading="lazy">
          @endif
        </div>
      @endforeach

      <!-- Loop duplicates for continuous smooth marquee scroller -->
      @foreach($logos as $client)
        <div class="marquee-item" aria-hidden="true">
          @if($client->website_url)
            <a href="{{ $client->website_url }}" target="_blank" rel="noopener noreferrer" tabindex="-1">
              <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" loading="lazy">
            </a>
          @else
            <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" loading="lazy">
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

