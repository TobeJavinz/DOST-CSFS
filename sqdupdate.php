<div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5 mt-6">
    <div class="flex justify-between">
        <!-- diri isulod na div -->
        <div>
            <div class="text-2xl font-semibold mb-10">
                1. How will you RATE the delivery of our assistance/service?
            </div>
            <fieldset>
                <legend class="text-sm font-semibold leading-5 text-gray-900">
                    Legend
                </legend>
                <div class="pt-5 flex flex-wrap items-center gap-4">
                    <div class="relative flex items-center gap-x-1">
                        <label for="industry" class="font-medium text-gray-900">1-Strongly Disagree</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                        <label for="civil-society" class="font-medium text-gray-900">2-Disagree
                        </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                        <label for="academe" class="font-medium text-gray-900">3-Neither Agree nor Disagree</label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                        <label for="government" class="font-medium text-gray-900">4-Agree
                        </label>
                    </div>
                    <div class="relative flex items-center gap-x-3">
                        <label for="media" class="font-medium text-gray-900">5-Strongly Agree</label>
                    </div>
                </div>
            </fieldset>
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD0. I am satisfied with the assistance / service
                                    that I availed.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    Overall Perception of the Assistance/Service
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd0" value="5" type="radio" <?php if ($row['sqd0'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd0" value="4" type="radio" <?php if ($row['sqd0'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd0" value="3" type="radio" <?php if ($row['sqd0'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd0" value="2" type="radio" type="radio" <?php if ($row['sqd0'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd0" value="1" type="radio" type="radio" <?php if ($row['sqd0'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd0  -->


            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD1. I spent a reasonable amount of time for my transaction or the
                                    availed assistance / service.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (The coordination timeline and transactional timeline are convenient and in
                                    accordance
                                    to the Citizen’s Charter of DOST.)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd1" value="5" type="radio" <?php if ($row['sqd1'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd1" value="4" type="radio" <?php if ($row['sqd1'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd1" value="3" type="radio" <?php if ($row['sqd1'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd1" value="2" type="radio" type="radio" <?php if ($row['sqd1'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd1" value="1" type="radio" type="radio" <?php if ($row['sqd1'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd1 -->


            <!-- start of sqd2 -->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD2. The office followed the transaction or the availed assistance /
                                    service’s requirements and steps based on the information provided.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (Provided what was needed and what was promised in accordance with the policy and
                                    standards and mutually agreed terms and conditions.)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd2" value="5" type="radio" <?php if ($row['sqd2'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd2" value="4" type="radio" <?php if ($row['sqd2'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd2" value="3" type="radio" <?php if ($row['sqd2'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd2" value="2" type="radio" type="radio" <?php if ($row['sqd2'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd2" value="1" type="radio" type="radio" <?php if ($row['sqd2'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd2 -->

            <!-- start of sqd3-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD3. The steps (including payment, if applicable) I needed to do for my
                                    transaction or the availed assistance / service were easy and simple.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (Including convenience of location, ample amenities for comfortable transactions,
                                    use
                                    of clear signages and modes of technology.)

                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd3" value="5" type="radio" <?php if ($row['sqd3'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd3" value="4" type="radio" <?php if ($row['sqd3'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd3" value="3" type="radio" <?php if ($row['sqd3'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd3" value="2" type="radio" type="radio" <?php if ($row['sqd3'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd3" value="1" type="radio" type="radio" <?php if ($row['sqd3'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd3 -->

            <!-- start of sqd4-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD4. I easily found information about my transaction or the availed
                                    assistance / service from the office or its website.

                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (Customers were informed in a language that can easily be understood and feedback
                                    mechanisms were in place)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd4" value="5" type="radio" <?php if ($row['sqd4'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd4" value="4" type="radio" <?php if ($row['sqd4'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd4" value="3" type="radio" <?php if ($row['sqd4'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd4" value="2" type="radio" type="radio" <?php if ($row['sqd4'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd4" value="1" type="radio" type="radio" <?php if ($row['sqd4'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd4 -->

            <!-- start of sqd5-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD5. I paid a reasonable amount of fees for my transaction.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    - (Including the satisfaction on spending a reasonable counterpart amount for the
                                    implementation of the assistance / service.)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd5" value="5" type="radio" <?php if ($row['sqd5'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd5" value="4" type="radio" <?php if ($row['sqd5'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd5" value="3" type="radio" <?php if ($row['sqd5'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd5" value="2" type="radio" type="radio" <?php if ($row['sqd5'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd5" value="1" type="radio" type="radio" <?php if ($row['sqd5'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd5 -->

            <!-- start of sqd8-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD8. I got what I needed from the government office, or (if denied) denial
                                    of request was sufficiently explained to me.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (The extent of achieving outcomes or realizing the intended benefits of the
                                    government
                                    assistance / service.)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd8" value="5" type="radio" <?php if ($row['sqd8'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd8" value="4" type="radio" <?php if ($row['sqd8'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd8" value="3" type="radio" <?php if ($row['sqd8'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd8" value="2" type="radio" type="radio" <?php if ($row['sqd8'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd8" value="1" type="radio" type="radio" <?php if ($row['sqd8'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd8 -->

            <!-- start of sqd6-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD6. I feel the office was fair to everyone, or “walang palakasan,” during
                                    my transaction.

                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (The assurance that there is honesty, justice, fairness, and trust in the availed
                                    assistance / service.)

                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd6" value="5" type="radio" <?php if ($row['sqd6'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd6" value="4" type="radio" <?php if ($row['sqd6'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd6" value="3" type="radio" <?php if ($row['sqd6'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd6" value="2" type="radio" <?php if ($row['sqd6'] == '2') {
                            echo "checked";
                        } ?>
                            type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd6" value="1" type="radio" <?php if ($row['sqd6'] == '1') {
                            echo "checked";
                        } ?>
                            type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of sqd6 -->

            <!-- start of sqd7-->
            <div class="pt-8 pl-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-3">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">
                                    SQD7. I was treated courteously by the staff, and (if asked for help) the
                                    staff was helpful.
                                </p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                    (The staff performed his/her duties, product / service knowledge, understand the
                                    customer’s needs, and good working relationship.)
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="pl-4">
                    <div class="flex items-center gap-x-3">
                        <input name="sqd7" value="5" type="radio" <?php if ($row['sqd7'] == '5') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="strongly-a" class="block text-xs font-medium leading-6 text-gray-900">5 - Strongly
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd7" value="4" type="radio" <?php if ($row['sqd7'] == '4') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />

                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">4 -
                            Agree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd7" value="3" type="radio" <?php if ($row['sqd7'] == '3') {
                            echo "checked";
                        } ?>
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">3 - Neither
                            Agree nor Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd7" value="2" type="radio" type="radio" <?php if ($row['sqd7'] == '2') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <label for="push-email" class="block text-xs font-medium leading-6 text-gray-900">2 -
                            Disagree</label>
                    </div>
                    <div class="flex items-center gap-x-3">
                        <input name="sqd7" value="1" type="radio" type="radio" <?php if ($row['sqd7'] == '1') {
                            echo "checked";
                        } ?> class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                        <div class="flex items-center gap-x-3">
                            <label for="push-everything" class="block text-xs font-medium leading-6 text-gray-900">1 -
                                Strongly Disagree</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- next question -->

        </div>
    </div>
</div>