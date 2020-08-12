@if($user_id = Session::get('user_id'))

                            <li><a href="{{URL::to(  'infor')}}" data-toggle="modal" data-target="#myAccountModal"><i class="fa fa-user-o"></i>
                                    <?php
                                    $name = Session::get('user_name');
                                    /**
                                    * 1. Nếu name tồn tại thì in ra bên dưới, còn không thì thôi
                                    */
                                    if ($name) {
                                        echo $name;
                                    }
                                    ?>
                                </a></li>
                        {{-- <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out"></i> Log out</a></li> --}}
                        @else

                        <script>
                            $(window).load(function() {
                                $('#loginModal').modal('show');
                            });
                        </script>
