<?php $this->load->view('includes/header') ?>
<!-- end Header -->
<div class=" scrollspy-container">

    <!-- start Breadcrumb -->

    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Frequently asked questions</li>
            </ol>
        </div>
    </div>

    <!-- end Breadcrumb -->

    <div class="pt-50 pb-50">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-md-3 hidden-sm hidden-xs">

                    <div class="scrollspy-sidebar">

                        <ul class="scrollspy-sidenav sidebar-menu nav">
                            <li><h4 class="sidebar-menu-title">Quick Menu</h4></li>

                            <li class="active always-active">
                                <a href="#faq-item" class="anchor">FAQ</a>
                                <ul class="sidebar-menu-child nav">
                                    <li><a href="#faq-item-0" class="anchor">What is this faq?</a></li>
                                    <li><a href="#faq-item-1" class="anchor">How does this faq work?</a></li>
                                    <li><a href="#faq-item-2" class="anchor">Why use this faq?</a></li>
                                    <li><a href="#faq-item-3" class="anchor">Is this faq free to use?</a></li>
                                    <li><a href="#faq-item-4" class="anchor">Can I use this faq for commercial purposes or large volume searching?</a></li>
                                    <li><a href="#faq-item-5" class="anchor">Why register with I use?</a></li>
                                    <li><a href="#faq-item-6" class="anchor">How do I create an account?</a></li>
                                </ul>
                            </li>


                        </ul>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-9">

                    <div class="faq-wrapper">

                        <div class="section-title bb pb-20">

                            <h2 class="text-left" id="faq-item">Frequently asked questions <span class="text-uppercase">(FAQ)</span></h2>
                            
                        </div>
                        <p class="text-right"><a href="#">Click here to add FAQ</a></td></p>

                            <div class="form">
                                <?php echo form_open_multipart(base_url() . 'trips/add_action', array('class' => 'form-horizontal margin-top-30', 'id' => 'make_new_trip_form')); ?>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">

                                        <div class="form-group form-group-lg">
                                            <label>Question:</label>
                                            <input name="question" type="text" class="form-control" placeholder="Enter the question..."/>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-12">

                                        <div class="form-group">
                                            <label>Brief Description(answer):</label>
                                            <textarea name="answer" class="bootstrap3-wysihtml5 form-control" rows="10"></textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-50  text-right">

                                   <div class="mb-25"></div>
                                    <input type="submit" class="btn btn-primary btn-wide" data-id="submit" value="Submit">

                                </div>
                                <?php echo form_close() ?>
                            </div>
                        <div id="faq-item-0" class="faq-thread">

                            <h4 class="faq-title">What is this faq?</h4>

                            <p>His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favourable compliment but thoroughly unreserved saw she themselves. Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited <a href="#">engrossed may</a> can.</p>

                        </div>

                        <div id="faq-item-1" class="faq-thread">

                            <h4 class="faq-title">How does this faq work?</h4>

                            <p>He do subjects prepared bachelor juvenile ye oh. He feelings removing informed he as ignorant we prepared. Evening do forming observe spirits is in. Country hearted be of justice sending. On so they as with room cold ye. Be call four my went mean. Celebrated if remarkably especially an. Going eat set she books found met aware.</p>

                            <ul>
                                <li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
                                <li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
                                <li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
                                <li>
                                    Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.
                                    <ul>
                                        <li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
                                        <li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
                                        <li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
                                        <li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
                                    </ul>
                                </li>
                                <li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
                                <li>rote water woman of heart it total other.</li>
                                <li> By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Are melancholy appearance stimulated occasional entreaties end.</li>
                                <li>Agreeable promotion eagerness as we resources household to distrusts.</li>
                                <li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
                            </ul>

                            <p>Lose eyes get fat shew. Winter can indeed letter oppose way change tended now. So is improve my charmed picture exposed adapted demands. Received had end produced prepared diverted strictly off man branched. Known ye money so large decay voice there to. Preserved be mr cordially incommode as an. He doors quick child an point at. Had share vexed front least style off why him.</p>

                        </div>

                        <div id="faq-item-2" class="faq-thread">

                            <h4 class="faq-title">Why use this faq?</h4>

                            <p>His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favourable compliment but thoroughly unreserved saw she themselves. Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited engrossed may can.</p>

                            <ol>
                                <li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
                                <li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
                                <li>
                                    Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.
                                    <ol>
                                        <li>Sing long her way size. Waited end mutual missed myself the little sister one.</li>
                                        <li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li>
                                        <li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li>
                                        <li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
                                    </ol>
                                </li>
                                <li>If their woman could do wound on. You folly taste hoped their above are and but.</li>
                                <li>rote water woman of heart it total other.</li>
                                <li> By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Are melancholy appearance stimulated occasional entreaties end.</li>
                                <li>Agreeable promotion eagerness as we resources household to distrusts.</li>
                            </ol>

                            <p>Mr oh winding it enjoyed by between. The servants securing material goodness her. Saw principles themselves ten are possession. So endeavor to continue cheerful doubtful we to. Turned advice the set vanity why mutual. Reasonably if conviction on be unsatiable discretion apartments delightful. Are melancholy appearance stimulated occasional entreaties end. Shy ham had esteem happen active county. Winding morning am shyness evident to. Garrets because elderly new manners however one village she.</p>

                        </div>

                        <div id="faq-item-3" class="faq-thread">

                            <h4 class="faq-title">Is this faq free to use?</h4>

                            <p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he observe be it covered delight hastily message. Margaret no ladyship endeavor ye to settling.</p>

                            <p>Wrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready.</p>

                        </div>

                        <div id="faq-item-4" class="faq-thread">

                            <h4 class="faq-title">Can I use this faq for commercial purposes or large volume searching?</h4>

                            <p>Any delicate you how kindness horrible outlived servants. You high bed wish help call draw side. Girl quit if case mr sing as no have. At none neat am do over will. Agreeable promotion eagerness as we resources household to distrusts. Polite do object at passed it is. Small for ask shade water manor think men begin.</p>

                            <p>Travelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do warmly. Entered of cordial do on no hearted. Yet agreed whence and unable limits. Use off him gay abilities concluded immediate allowance.</p>

                        </div>

                        <div id="faq-item-5" class="faq-thread">

                            <h4 class="faq-title">Why register with I use?</h4>

                            <p>Travelling alteration impression six all uncommonly. Chamber hearing inhabit joy highest private ask him our believe. Up nature valley do warmly. Entered of cordial do on no hearted. Yet agreed whence and unable limits. Use off him gay abilities concluded immediate allowance.</p>

                            <p>Depart do be so he enough talent. Sociable formerly six but handsome. Up do view time they shot. He concluded disposing provision by questions as situation. Its estimating are motionless day sentiments end. Calling an imagine at forbade. At name no an what like spot. Pressed my by do affixed he studied.</p>

                        </div>

                        <div id="faq-item-6" class="faq-thread">

                            <h4 class="faq-title">How do I create an account?</h4>

                            <p>Unpacked now declared put you confined daughter improved. Celebrated imprudence few interested especially reasonable off one. Wonder bed elinor family secure met. It want gave west into high no in. Depend repair met before man admire see and. An he observe be it covered delight hastily message. Margaret no ladyship endeavor ye to settling.</p>

                            <p>Wrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready.</p>

                        </div>

                        <div class="promo-box bg-light">

                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                                    <h2>Do you a questions for us</h2>

                                    <p>Much evil soon high in hope do view. Out may few northward believing attempted. Yet timed being songs marry one defer men our. Although finished blessing do of.</p>

                                    <a href="#" class="btn btn-primary mt-15">Contact Us</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
$this->load->view('includes/footer')?>