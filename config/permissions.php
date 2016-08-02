<?php
  return [
        'Users.SimpleRbac.permissions' => [
            [
                'role' => 'user',
                'controller' => ['Users'],
                'plugin' => ['CakeDC/Users'],
                'action' => ['logout'],
                'allowed' => true,
            ],
            [
                'role' => 'company',
                'controller' => ['Companes'],
                'action' => ['addCompany', 'deleteFile','imageUpload','download','addSchedule','bookSchedule','deleteSchedule','approveSchedule','declineSchedule','deleteBookSchedule','approveingSchedule','declineBookSchedule','bookingList'],
                'allowed' => true,
            ],
            [
                'role' => 'user',
                'controller' => ['Pages'],
                'action' => ['search', 'userPage','contact','index','logout','profile'],
                'allowed' => true,
            ],
            [
                'role' => 'user',
                'controller' => ['Transactions'],
                'action' => ['index', 'output'],
                'allowed' => true,
            ],
            [
                'role' => 'admin',
                'controller' => ['Admins'],
                'allowed' => true,
            ],
            [
                'role' => 'admin',
                'controller' => ['Users'],
                'action' => ['logout'],
                'allowed' => true,
            ],
            [
                'role' => 'admin',
                'controller' => ['Profiles'],
                'action' => ['userEdit', 'deleteFile','imageUpload','download','addSchedule','bookSchedule','deleteSchedule','approveSchedule','declineSchedule','deleteBookSchedule','approveingSchedule','declineBookSchedule','bookingList'],
                'allowed' => true,
            ],
            [
                'role' => 'admin',
                'controller' => ['Transactions'],
                'action' => ['index', 'output'],
                'allowed' => true,
            ]
        ]
    ];