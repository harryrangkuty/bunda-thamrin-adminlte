<aside class="app-sidebar sidebar d-flex flex-column bg-dark text-light p-3"
    style="width: 250px; min-height: 100vh; font-family: 'Poppins', sans-serif;">
    <a href="/dashboard" class="d-flex align-items-center mb-4 text-decoration-none text-light">
        <img src="{{ asset('/images/bunda-thamrin-logo.png') }}" alt="Logo" width="40" height="40"
            class="me-2 rounded-circle shadow-sm" />
        <span class="fs-6 fw-semibold">SIMRS Bunda Thamrin</span>
    </a>
    <nav class="flex-grow-1">
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="/dashboard"
                    class="nav-link text-light d-flex align-items-center rounded-3 {{ request()->is('dashboard') ? 'active' : 'bg-transparent' }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-ui-checks-grid fs-5 me-3"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="/patients"
                    class="nav-link text-light d-flex align-items-center rounded-3 {{ request()->is('patients') ? 'active' : 'bg-transparent' }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-person-lines-fill fs-5 me-3"></i> Data Pasien
                </a>
            </li>
            <li class="nav-item">
                <a href="/registrations"
                    class="nav-link text-light d-flex align-items-center rounded-3 {{ request()->is('registrations') ? 'active' : 'bg-transparent' }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-clipboard-check fs-5 me-3"></i> Pendaftaran
                </a>
            </li>

            <li class="nav-header mt-4 mb-2 text-uppercase text-secondary small">Administrator</li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link text-light d-flex align-items-center justify-content-between rounded-3"
                    data-bs-toggle="collapse" data-bs-target="#masterData" aria-expanded="false"
                    aria-controls="masterData">
                    <span><i class="bi bi-gear fs-5 me-3"></i> Master Data</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="collapse ps-4 mt-2" id="masterData">
                    <ul class="nav flex-column gap-1">
                        <li>
                            <a href="#"
                                class="nav-link text-light rounded-3 {{ request()->is('user') ? 'active' : 'bg-transparent' }}">
                                <i class="bi bi-person fs-6 me-2"></i> Data User
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-link text-light rounded-3 {{ request()->is('role') ? 'active' : 'bg-transparent' }}">
                                <i class="bi bi-shield-lock fs-6 me-2"></i> Role
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-link text-light rounded-3 {{ request()->is('permission') ? 'active' : 'bg-transparent' }}">
                                <i class="bi bi-sliders fs-6 me-2"></i> Permission
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-header mt-4 mb-2 text-uppercase text-secondary small">Panduan</li>
            <li class="nav-item">
                <a href="{{ asset('/panduan_simrs.pdf') }}" download class="nav-link text-light d-flex align-items-center rounded-3">
                    <i class="bi bi-book fs-5 me-3"></i> Buku Panduan
                </a>
            </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-light d-flex align-items-center rounded-3">
                    <i class="bi-chat-dots fs-5 me-3"></i> FAQ
                </a>
            </li>
        </ul>
    </nav>
</aside>
