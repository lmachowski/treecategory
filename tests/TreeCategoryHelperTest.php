<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TreeCategoryHelperTest extends TestCase
{

    private function _getListData(){
        return '[
                   {
                      "category_id":"1",
                      "order":"2",
                      "root":"1",
                      "in_loyalty":"0",
                      "translations":{
                         "pl_PL":{
                            "trans_id":"1",
                            "category_id":"1",
                            "name":"Kobiety",
                            "description":"",
                            "active":"1",
                            "pres_id":null,
                            "isdefault":"1",
                            "lang_id":"1",
                            "seo_title":"",
                            "seo_description":"",
                            "seo_keywords":"",
                            "seo_url":"",
                            "items":1,
                            "attribute_groups":[
                               1,
                               2
                            ]
                         }
                      }
                   },
                   {
                      "category_id":"2",
                      "order":"4",
                      "root":"0",
                      "in_loyalty":"0",
                      "translations":{
                         "pl_PL":{
                            "trans_id":"2",
                            "category_id":"2",
                            "name":"Sp\u00f3dnice",
                            "description":"",
                            "active":"1",
                            "pres_id":null,
                            "isdefault":"1",
                            "lang_id":"1",
                            "seo_title":"",
                            "seo_description":"",
                            "seo_keywords":"",
                            "seo_url":"",
                            "items":1,
                            "attribute_groups":[
                               2
                            ]
                         }
                      }
                   }
                ]';

    }

    public function testGetNameCategory(): void
    {
        $list = json_decode($this->_getListData());

        $object = new TreeCategoryHelper();
        $object->setList($list);
        $method = $this->getPrivateMethod( 'TreeCategoryHelper', '_getNameCategoryById' );;
        $method->setAccessible( true );

        $result = $method->invokeArgs( $object, [1] );

        $this->assertEquals( 'Kobiety', $result ); // whatever your assertion is
    }

    /**
     * getPrivateMethod
     *
     * @param string $className
     * @param string $methodName
     * @return    ReflectionMethod
     * @throws ReflectionException
     */
    public function getPrivateMethod( $className, $methodName ) {
        $reflector = new ReflectionClass( $className );
        $method = $reflector->getMethod( $methodName );
        $method->setAccessible( true );

        return $method;
    }
}