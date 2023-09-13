<x-layout-with-band type="dashboard">

  <div class="container dashboard mb-5 pb-3">
    <div class="bg-light shadow-lg rounded-3 overflow-hidden">
      <div class="row">
        <!-- Sidebar-->
        <x-dashboard-sidebar announcementToRevisedCount="{{ $announcements_to_revised_count }}"
          requestsCount="{{ $requests_count }}" usersCount="{{ $revisors_count }}" />
        <!-- Content-->
        <section class="col-lg-9 pt-lg-4 pb-4 mb-3">

          <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
            <div>
              {{-- titolo --}}
              <div class="text-center">
                <h2 class="h3">{{ $announcement->title }}</h2>
              </div>
              <div
                class="d-flex aling-items-center justify-content-sm-between justify-content-center flex-wrap mb-sm-4 mb-3 mt-3">
                <div class="mb-2 me-sm-3 me-2 d-flex aling-items-center small">
                  <p>
                    <i class="fa-regular fa-calendar me-2"></i>
                    <span>{{ $announcement->created_at->format('d/m/Y') }}</span>
                  </p>
                  <p>
                    <a class="border-start ms-2 ps-2 user" href="{{ route('dashboard.user', $announcement->user->id) }}">
                      <i class="fa-regular fa-user me-2"></i>
                      <span>{{ $announcement->user->name }}</span>
                    </a>
                  </p>
                </div>
                <div>
                  <a class="btn btn-sm btn-success mb-2"
                    onclick="event.preventDefault();getElementById('form-accept-announcement').submit()">
                    <i class="fa-solid fa-check me-2"></i>Accetta
                  </a>
                  <form action="{{ route('dashboard.accept-announcement', $announcement->id) }}" method="post"
                    class="d-none" id="form-accept-announcement">
                    @csrf
                  </form>
                  <a class="btn btn-sm btn-danger mb-2 ms-2 me-3"
                    onclick="event.preventDefault();getElementById('form-reject-announcement').submit()">
                    <i class="fa-solid fa-xmark me-2"></i>Rifiuta
                  </a>
                  <form action="{{ route('dashboard.reject-announcement', $announcement->id) }}" method="post"
                    class="d-none" id="form-reject-announcement">
                    @csrf
                  </form>
                </div>
                {{-- <div class="mb-2 me-sm-3 me-2 ps-sm-3 ps-2 border-start"><i class="fas fa-eye me-2"></i>15 views</div>
              <div class="mb-2 me-sm-3 me-2 ps-sm-3 ps-2 border-start"><i class="far fa-heart me-2"></i>4 favorite --}}
              </div>
            </div>

            <div class="row row-cols-md-2 row-cols-1 gy-3 gx-4 mb-4 pb-md-2">

              <div class="col">
                <div class="position-relative rounded-3 overflow-hidden mb-lg-4 mb-3 ">
                  <img class="w-100 rounded" src="https://picsum.photos/400/300">
                </div>
              </div>
              {{-- creator --}}
              <div class="col">

                <div class="row row-cols-1 gy-3 gx-4 mb-4 pb-md-2">


                </div>
                {{-- description --}}
                <div class="col">
                  <p class="mb-4 pb-md-2 fs-sm"> {{ $announcement->description }} </p>
                </div>
                {{-- price --}}
                <div class="col">
                  <h3 class="h6 mb-2 fs-sm text-muted">Prezzo</h3>
                  <h2 class="h3 mb-1"> € {{ $announcement->price }}</h2>
                </div>
                {{-- category --}}
                <div class="col">
                  <h3 class="h6 mb-2 fs-sm text-muted">Categoria</h3>
                  <h2 class="h3 mb-1"> {{ $announcement->category->name }}</h2>
                </div>
              </div>

            </div>
          </div>
      </div>

    </div>
    {{-- <p class="mb-4 pb-md-2 fs-sm"> {{ $announcement->description }} </p> --}}

    {{-- <div class="row row-cols-sm-2 row-cols-1 gy-3 mb-4 pb-md-2">
              <div class="col">
                <h3 class="h6 mb-2 fs-sm text-muted">Prezzo</h3>
                <h2 class="h3 mb-1"> € {{ $announcement->price }}</h2>
              </div>
              <div class="col">
                <h3 class="h6 mb-2 fs-sm text-muted">Categoria</h3>
                <h2 class="h3 mb-1"> {{ $announcement->category->name }}</h2>
              </div>
            </div> --}}
  </div>
  </div>
  </div>
  </section>
  </div>
  </div>
  </div>

</x-layout-with-band>