<section class="flex flex-col">
	@foreach($posts as $post)
	<article class="relative flex flex-col gap-2">
		<div class="flex flex-col gap-6 lg:p-16">
			<!-- category and date -->
			<div class="flex h-full items-start justify-between">
				<!-- TODO: category name -->
				<a href="#" class="relative z-10 hover:text-orange-600">
					Development
				</a>
				<span>{{ $post->created_at->toFormattedDateString() }}</span>
			</div>
			<!-- title -->
			<h3 class="hover:text-orange-600">
				<a href="{{ route('news.post.index', ['id' => $post->id]) }}" class="after:absolute after:inset-0">
					{{ $post->title }}
				</a>
			</h3>
			<!-- TODO: except instead of body -->
			<p>{{ $post->body }}</p>
			<p>{{ $post->author->name }}</p>
		</div>
	</article>
	@endforeach
</section>
