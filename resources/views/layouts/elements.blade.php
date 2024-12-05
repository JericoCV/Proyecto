<div class="page-content" style="margin-top: 80px">
    @foreach ($sections as $section)
        <div class="section" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 200 }}">
            <h2 class="section-title">{{ $section->title }}</h2>
            <div class="section-elements">
                @foreach ($section->elements as $element)
                    @if ($element->type === 'text')
                        <p class="element-text">{!! nl2br(e($element->content)) !!}</p>
                    @elseif ($element->type === 'image')
                        <img src="{{ asset('storage/' . $element->image_path) }}" alt="Element Image" class="element-image">
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>