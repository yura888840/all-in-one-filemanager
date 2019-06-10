<?php

namespace App\CommunicationBundle\KeyValueObjectMock;

use App\CommunicationBundle\Utils\MockInterface;

class ListListMock implements MockInterface
{
    public static function getMock()
    {
        return [
            'success' => true,
            'errorMsg' => null,
            'error' => null,
            'data' => [
                [
                    'name' => 'tst',
                    'type' => 'file',
                    'size' => 234234234,
                    'createdAt' => 15234489904532.472,
                    'updatedAt' => 15234489904532.472,
                ],
                [

                    'name'	=> 'rtl8723b_mp_chip_bt40_fw_asic_rom_patch_new.dll',
                    'type'	=> 'file',
                    'size'	=> 51068,
                    'createdAt'	=> 1537931574000,
                    'updatedAt'	=> 1537931574000
                ],
                [

                    'name'	=> 'patch_new.txt',
                    'type'	=> 'file',
                    'size'	=> 51068,
                    'createdAt'	=> 1537931574000,
                    'updatedAt'	=> 1537931574000
                ],
                [
                    'name'	=> 'addins',
                    'type'	=> 'dir',
                    'size'	=> 0,
                    'createdAt'	=> 1536996830471.8247,
                    'updatedAt' =>	1536996834300.2798
                ]
            ]
        ];
    }
}
