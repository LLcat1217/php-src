--TEST--
SOAP XML Schema 74: Structure with attributes and qualified elements
--EXTENSIONS--
soap
xml
--FILE--
<?php
include "test_schema.inc";
$schema = <<<EOF
    <complexType name="testType">
        <sequence>
            <element name="str" type="string"/>
        </sequence>
        <attribute name="int" type="int"/>
    </complexType>
EOF;

test_schema($schema,'type="tns:testType"',(object)array("str"=>"str","int"=>123.5), "rpc", "encoded", 'attributeFormDefault="qualified"');
echo "ok";
?>
--EXPECTF--
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://test-uri/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:test><testParam ns1:int="123" xsi:type="ns1:testType"><str xsi:type="xsd:string">str</str></testParam></ns1:test></SOAP-ENV:Body></SOAP-ENV:Envelope>
object(stdClass)#%d (2) {
  ["str"]=>
  string(3) "str"
  ["int"]=>
  int(123)
}
ok
