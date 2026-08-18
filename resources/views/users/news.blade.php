@extends('users.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>


        
        .nav-link {
           color: white !important;
       }
       
       :root {
           --primary-color: #0077b6;
           --secondary-color: #48cae4;
           --accent-color: #00b4d8;
           --dark-text: #2b2d42;
           --light-text: #6c757d;
       }

  @keyframes typing {
    from { width: 0 }
    to { width: 100% }
  }
  
  @keyframes blink-caret {
    from, to { border-color: transparent }
    50% { border-color: #fff; }
  }
  
  .typing-animation {
    overflow: hidden;
    white-space: nowrap;
    margin: 0 auto;
    letter-spacing: 2px;
    display: inline-block;
  }
  
  .typing-cursor {
    display: inline-block;
    width: 3px;
    background-color: #fff;
    margin-left: 2px;
    animation: blink 1s step-end infinite;
  }
  
  @keyframes blink {
    from, to { opacity: 1; }
    50% { opacity: 0; }
  }
</style>
@section('content')
<!-- Hero Section -->
<section class="news-hero" style="position: relative; min-height: 70vh; overflow: hidden; margin: 0; padding: 0;">
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
              background: url({{ asset('assets/images/news.jpg') }}) center top / cover no-repeat;
              margin: 0;
              padding: 0;">
  </div>

  <div style="position: relative; z-index: 1; min-height: 100%; display: flex; align-items: center; justify-content: center; padding: 8rem 1rem 4rem; ">
    <div style="max-width: 800px; margin: 0 auto; color: white; text-align: center;">
      <h1 id="news-heading" style="font-size: 3.5em; margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);"></h1>
      <p id="news-subheading" style="font-size: 1.3em; margin: 2rem 0; text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">
        <span id="typing-text"></span><span class="typing-cursor">|</span>
      </p>
      
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Main heading typing effect
          const heading = document.getElementById('news-heading');
          const headingText = 'Latest Medical News & Updates';
          let headingIndex = 0;
          
          function typeHeading() {
            if (headingIndex < headingText.length) {
              heading.textContent += headingText.charAt(headingIndex);
              headingIndex++;
              setTimeout(typeHeading, 50);
            } else {
              // Start subheading animation after heading is done
              const subTexts = [
                'Stay informed with the latest medical research',
                'Discover new health tips and advice',
                'Explore healthcare advancements and innovations'
              ];
              let subIndex = 0;
              let textIndex = 0;
              let isDeleting = false;
              
              function typeSubheading() {
                const currentText = subTexts[subIndex];
                const typingText = document.getElementById('typing-text');
                
                if (isDeleting) {
                  // Delete text
                  typingText.textContent = currentText.substring(0, textIndex - 1);
                  textIndex--;
                } else {
                  // Type text
                  typingText.textContent = currentText.substring(0, textIndex + 1);
                  textIndex++;
                }
                
                // Change direction if needed
                if (!isDeleting && textIndex === currentText.length) {
                  // Pause at end of text
                  setTimeout(() => {
                    isDeleting = true;
                    typeSubheading();
                  }, 2000);
                  return;
                } else if (isDeleting && textIndex === 0) {
                  // Move to next text
                  isDeleting = false;
                  subIndex = (subIndex + 1) % subTexts.length;
                }
                
                // Set typing speed
                const typingSpeed = isDeleting ? 30 : 50;
                setTimeout(typeSubheading, typingSpeed);
              }
              
              // Start subheading animation
              typeSubheading();
            }
          }
          
          // Start the typing effect
          typeHeading();
        });
      </script>
      <form action="{{ route('news.search') }}" method="GET" style="width: 100%; max-width: 600px; margin: 0 auto;">
        <div style="position: relative; display: flex;">
          <input type="text" 
                 name="search" 
                 placeholder="Search for articles..." 
                 value="{{ request('search') }}"
                 style="width: 100%; padding: 12px 20px; border: none; border-radius: 30px 0 0 30px; font-size: 1em;">
          <button type="submit" style="background: #3498db; color: white; border: none; padding: 0 25px; border-radius: 0 30px 30px 0; cursor: pointer; font-weight: 600;">Search</button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Articles Section -->
<section class="container" style="padding: 4rem 1rem;">
  @if(request('search'))
    <h2 class="section-title" style="text-align: center; margin-bottom: 2rem; color: #2c3e50; font-size: 2.2em;">
      Search Results for "{{ request('search') }}"
    </h2>
  @else
    <h2 class="section-title" style="text-align: center; margin-bottom: 2rem; color: #2c3e50; font-size: 2.2em;">
      Latest Articles
    </h2>
  @endif
  
  @if(isset($news) && $news->count() > 0)
    <div class="articles-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
      @foreach($news as $article)
        <a href="{{ route('article.show', $article->id) }}" style="text-decoration: none;">
          <div class="article-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
            @if($article->image)
              <div style="height: 200px; overflow: hidden;">
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover;">
              </div>
            @endif
            <div style="padding: 1.5rem;">
              <h3 style="color: #2c3e50; margin-bottom: 0.8rem;">{{ $article->title }}</h3>
              <p style="color: #2c3e50; margin-bottom: 1rem; line-height: 1.6;">
                {{ Str::limit(strip_tags($article->content), 150) }}
              </p>
              <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #eee;">
                <span style="color: #3498db; font-weight: 500; font-size: 0.9em;">By {{ $article->author }}</span>
                <span style="color: #7f8c8d; font-size: 0.9em; background: #f8f9fa; padding: 3px 10px; border-radius: 15px;">{{ $article->created_at->format('M d, Y') }}</span>
              </div>
            </div>
          </div>
        </a>
      @endforeach
    </div>
    
    <!-- Pagination -->
    <div style="margin-top: 3rem; display: flex; justify-content: center;">
      {{ $news->withQueryString()->links() }}
    </div>
  @else
    <div style="text-align: center; padding: 3rem 0; background: #f8f9fa; border-radius: 10px;">
      <p style="font-size: 1.2em; color: #2c3e50; padding: 1.5rem;">
        @if(request('search'))
          No articles found matching your search. Try different keywords.
        @else
          No articles available at the moment. Please check back later.
        @endif
      </p>
    </div>
  @endif
        <img src="{{ asset('assets/images/research.png') }}" alt="Medical Research" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <div style="padding: 2rem;">
        <div style="display: flex; align-items: center; margin-bottom: 1rem; color: #3498db;">
          <span style="background: #e74c3c; color: white; padding: 3px 10px; border-radius: 15px; font-size: 0.8em; margin-right: 15px; font-weight: 500;">LATEST</span>
          <span style="color: #2c3e50;">October 7, 2025</span>
          <span style="margin: 0 10px; color: #ddd;">•</span>
          <span style="color: #2c3e50;">5 min read</span>
        </div>
        <h2 style="font-size: 2em; margin-bottom: 1rem; color: #2c3e50;">Breakthrough in Diabetes Treatment Shows Promising Results</h2>
        <p style="color: #2c3e50; margin-bottom: 1.5rem; line-height: 1.7; font-size: 1.05em;">
          New research reveals a potential game-changer in diabetes management. The study shows significant improvement in blood sugar control with fewer side effects compared to current treatments.
        </p>
        <a href="#" style="color: #3498db; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center;">
          Read Full Article <span style="margin-left: 5px;">→</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Latest Articles -->
  <h2 class="section-title" style="margin: 3rem 0 2rem; color: #2c3e50; font-size: 1.8em;">Latest Updates</h2>
  
  <div class="articles-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
    <!-- Article 1 -->
    <a href="{{ route('article.show', 1) }}" style="text-decoration: none;">
      <div class="article-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
        <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-top-left-radius: 10px; border-top-right-radius: 10px;">
          <img src="{{ asset('assets/images/update.png') }}" alt="Heart Health" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 10px;">
        </div>
        <div style="padding: 1.5rem;">
          <div style="display: flex; align-items: center; margin-bottom: 0.8rem; color: #7f8c8d; font-size: 0.9em;">
            <span>October 5, 2025</span>
            <span style="margin: 0 10px;">•</span>
            <span>4 min read</span>
          </div>
          <h3 style="font-size: 1.3em; margin-bottom: 0.8rem; color: #2c3e50;">New Guidelines for Heart Health in 2025</h3>
          <p style="color: #7f8c8d; margin-bottom: 1.2rem; line-height: 1.6; font-size: 0.95em;">
            The American Heart Association releases updated guidelines focusing on preventive care and early detection of cardiovascular diseases.
          </p>
          <span style="color: #3498db; font-weight: 500; font-size: 0.95em;">Read More →</span>
        </div>
      </div>
    </a>

    <!-- Article 2 -->
    <div class="article-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
      <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <img src="{{ asset('assets/images/mentalhealth.png') }}" alt="Mental Health" style="max-width: 100%; max-height: 100%;  object-fit: contain; border-radius: 10px;">
      </div>
      <div style="padding: 1.5rem;">
        <div style="display: flex; align-items: center; margin-bottom: 0.8rem; color: #7f8c8d; font-size: 0.9em;">
          <span>October 3, 2025</span>
          <span style="margin: 0 10px;">•</span>
          <span>6 min read</span>
        </div>
        <h3 style="font-size: 1.3em; margin-bottom: 0.8rem; color: #2c3e50;">The Impact of Technology on Mental Health</h3>
        <p style="color: #7f8c8d; margin-bottom: 1.2rem; line-height: 1.6; font-size: 0.95em;">
          Exploring how digital tools and apps are revolutionizing mental health care and therapy accessibility worldwide.
        </p>
        <a href="{{ route('article.show', 2) }}" style="color: #3498db; text-decoration: none; font-weight: 500; font-size: 0.95em;">Read More →</a>
      </div>
    </div>

    <!-- Article 3 -->
    <a href="{{ route('article.show', 3) }}" style="text-decoration: none;">
      <div class="article-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
        <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-top-left-radius: 10px; border-top-right-radius: 10px;">
          <img src="{{ asset('assets/images/diet.png') }}" alt="Nutrition" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 10px;">
        </div>
        <div style="padding: 1.5rem;">
          <div style="display: flex; align-items: center; margin-bottom: 0.8rem; color: #7f8c8d; font-size: 0.9em;">
            <span>September 28, 2025</span>
            <span style="margin: 0 10px;">•</span>
            <span>7 min read</span>
          </div>
          <h3 style="font-size: 1.3em; margin-bottom: 0.8rem; color: #2c3e50;">Plant-Based Diets: Benefits and Considerations</h3>
          <p style="color: #7f8c8d; margin-bottom: 1.2rem; line-height: 1.6; font-size: 0.95em;">
            A comprehensive look at the health benefits of plant-based eating and how to ensure proper nutrition.
          </p>
          <span style="color: #3498db; font-weight: 500; font-size: 0.95em;">Read More →</span>
        </div>
      </div>
    </a>
        <!-- Article 4 -->
    <a href="{{ route('article.show', 4) }}" style="text-decoration: none;">
      <div class="article-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
        <div style="height: 200px; overflow: hidden; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-top-left-radius: 10px; border-top-right-radius: 10px;">
          <img src="{{ asset('assets/images/telecom.jpg') }}" alt="Telemedicine" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 10px;">
        </div>
        <div style="padding: 1.5rem;">
          <div style="display: flex; align-items: center; margin-bottom: 0.8rem; color: #7f8c8d; font-size: 0.9em;">
            <span>September 25, 2025</span>
            <span style="margin: 0 10px;">•</span>
            <span>5 min read</span>
          </div>
          <h3 style="font-size: 1.3em; margin-bottom: 0.8rem; color: #2c3e50;">The Future of Telemedicine: Trends to Watch</h3>
          <p style="color: #7f8c8d; margin-bottom: 1.2rem; line-height: 1.6; font-size: 0.95em;">
            How virtual healthcare is evolving and what patients can expect from telemedicine services in the coming years.
          </p>
          <span style="color: #3498db; font-weight: 500; font-size: 0.95em;">Read More →</span>
        </div>
      </div>
    </a>
  </div>

 
</section>

<style>
  .article-card:hover {
    transform: translateY(-5px);
  }
  
  @media (max-width: 768px) {
    .featured-article > div {
      grid-template-columns: 1fr;
    }
    
    .featured-article img {
      height: 250px !important;
    }
    
    .news-hero h1 {
      font-size: 2.5em !important;
    }
    
    .news-hero p {
      font-size: 1.1em !important;
    }
    
    .articles-grid {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@endsection
