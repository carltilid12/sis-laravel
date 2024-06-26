<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
            crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
            crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <link rel="stylesheet" href="/static/styles.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.min.css">
        <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="/">Student Information System</a>
                <button 
                    class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ url()->current() == url('/students') ? 'active' : '' }}" href="/students">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ url()->current() == url('/courses') ? 'active' : '' }}" href="/courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ url()->current() == url('/colleges') ? 'active' : '' }}" href="/colleges">Colleges</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <!-- {% if request.path != '/' %}
              {% if '/student/' not in request.path %}
              <nav class="navbar navbar-expand-lg navbar-dark mt-3" style="background-color: #54595E; border-radius: 10px;">
                  <div class="container">
                      <a class="navbar-brand">{% block page%}{% endblock %}</a>
                      <ul class="navbar-nav me-auto">
                          <li class="nav-item">
                              <input class="form-control" type="text" id="search-input" placeholder="Search">
                          </li>
                      </ul>
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              {% block create %}{% endblock %} 
                          </li>
                      </ul>
                  </div>
              </nav>         
              {% endif %}   
            {% endif %} -->
        
            @yield('content')

        </div> 
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"
        ></script>
        {{-- <script src="/static/js/index.js"></script> --}}
    </body>
</html>