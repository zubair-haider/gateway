<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testGetUserProfile()
    {
        $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2MTEwNTk1NjQsImV4cCI6MTYxMzY1MTU2NCwicm9sZXMiOltdLCJ1c2VybmFtZSI6InRlc3QyQHRlc3QuY29tIn0.1v6Un1vwKXM-GYkO_cospymwnGoxBc4bpWX3dcmTmNAsBEPWJ03AOOCUiA2NXNGmOMovMXHK4w40U2BrfXhnrjROSA4aHt4Ca8u3PvbPHySs2I_dR7lNuS3xDQjhCNH7RnrYiYxVCc177zzv3Dk6xgMxZUlQylMDolh6yiXxX2a4DpcjQcf0SeP37cnqlQiwtBjM2RGhVvK64Jrh81NEvaBoFHcnYZX4KJA3_7W_lfwxaH9RHRBFQqfMF5n2xkNg9163ai646vMx2AisQh3I4R8W_0W0m_e5MaXLPqvKeFJsjkHt82cVtHUFpgMGAbZWS0vewGO3NMEy9pG0PhTPF-O_yTAiKty7-nXxeL0eD5uX0JJ_AfYhLJpOIc9SHXEU7nX9qLU0hMPwuveSr-cg0YOAVMxKRuy_41cH9v-lVoSQKsQIK8EzwN-AYfq2mrVHfvx7vHALivNwEzgDKKqyBeJLxba3z9c7wzyRJT6poa4eaa9R0_xTjhTXgJW_PhxPDLxpPEXqE9ztXl_XR2t6GYxyqxrQW3C4yZPl4f-ufCCF5g7xsV14TDzSOV1ZMKUJmKVa18BbMXpRJEcR819p01SNdBXf4itFmT8bD7Ge8ZQGmsoebugXdMlS5HSRg-2QBdHSv4HGR2M_6I1YC-DEMoOnLApfsIW0kK9JtrZZjq8';
        $client = static::createClient([], ['HTTP_Authorization' => $token]);
        $client->request(
            'GET',
            '/api/user/me'
        );
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
