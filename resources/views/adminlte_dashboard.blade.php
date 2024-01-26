<style>
    .nav-pills .nav-link {
        padding-left: 20px;
        /* Adjust as needed */
    }

    .nav-pills .nav-treeview {
        margin-left: 10px;
        /* Adjust as needed */
    }

    
</style>

<div class="fixed-sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <h4>{{ __('Project progress') }}</h4>
    </div>



    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column list-group" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-close">
                <a href="#" class="nav-link">
                    <ion-icon name="list-outline"></ion-icon>
                    <p>
                        {{ __('Projects') }}
                        
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./" class="nav-link">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                            <p>{{ __('Display Completed Projects') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./" class="nav-link">
                            <ion-icon name="chevron-forward-circle-outline"></ion-icon>
                            <p>{{ __('Display Future Projects') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="./" class="nav-link">
                    <ion-icon name="alert-outline"></ion-icon>
                    <p>
                        {{ __('Information') }}
                        <span class="right badge badge-danger">{{ __('New') }}</span>
                    </p>
                </a>
            </li>
        </ul>
    </nav>

</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>