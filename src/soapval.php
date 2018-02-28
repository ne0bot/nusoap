<?php

/*
  $Id: nusoap.php,v 1.123 2010/04/26 20:15:08 snichol Exp $

  NuSOAP - Web Services Toolkit for PHP

  Copyright (c) 2002 NuSphere Corporation

  This library is free software; you can redistribute it and/or
  modify it under the terms of the GNU Lesser General Public
  License as published by the Free Software Foundation; either
  version 2.1 of the License, or (at your option) any later version.

  This library is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
  Lesser General Public License for more details.

  You should have received a copy of the GNU Lesser General Public
  License along with this library; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

  The NuSOAP project home is:
  http://sourceforge.net/projects/nusoap/

  The primary support for NuSOAP is the Help forum on the project home page.

  If you have any questions or comments, please email:

  Dietrich Ayala
  dietrich@ganx4.com
  http://dietrich.ganx4.com/nusoap

  NuSphere Corporation
  http://www.nusphere.com

 */

/*
 * 	Some of the standards implmented in whole or part by NuSOAP:
 *
 * 	SOAP 1.1 (http://www.w3.org/TR/2000/NOTE-SOAP-20000508/)
 * 	WSDL 1.1 (http://www.w3.org/TR/2001/NOTE-wsdl-20010315)
 * 	SOAP Messages With Attachments (http://www.w3.org/TR/SOAP-attachments)
 * 	XML 1.0 (http://www.w3.org/TR/2006/REC-xml-20060816/)
 * 	Namespaces in XML 1.0 (http://www.w3.org/TR/2006/REC-xml-names-20060816/)
 * 	XML Schema 1.0 (http://www.w3.org/TR/xmlschema-0/)
 * 	RFC 2045 Multipurpose Internet Mail Extensions (MIME) Part One: Format of Internet Message Bodies
 * 	RFC 2068 Hypertext Transfer Protocol -- HTTP/1.1
 * 	RFC 2617 HTTP Authentication: Basic and Digest Access Authentication
 */

namespace nusoap;

use nusoap\base;

/**
 * Description of soapval
 *
 * @author Jose Manuel Castro Prieto<osselito@gmail.com>
 */

/**
 * For creating serializable abstractions of native PHP types.  This class
 * allows element name/namespace, XSD type, and XML attributes to be
 * associated with a value.  This is extremely useful when WSDL is not
 * used, but is also useful when WSDL is used with polymorphic types, including
 * xsd:anyType and user-defined types.
 *
 * @author   Dietrich Ayala <dietrich@ganx4.com>
 * @version  $Id: nusoap.php,v 1.123 2010/04/26 20:15:08 snichol Exp $
 * @access   public
 */
class soapval extends nusoap_base {

    /**
     * The XML element name
     *
     * @var string
     * @access private
     */
    var $name;

    /**
     * The XML type name (string or false)
     *
     * @var mixed
     * @access private
     */
    var $type;

    /**
     * The PHP value
     *
     * @var mixed
     * @access private
     */
    var $value;

    /**
     * The XML element namespace (string or false)
     *
     * @var mixed
     * @access private
     */
    var $element_ns;

    /**
     * The XML type namespace (string or false)
     *
     * @var mixed
     * @access private
     */
    var $type_ns;

    /**
     * The XML element attributes (array or false)
     *
     * @var mixed
     * @access private
     */
    var $attributes;

    /**
     * constructor
     *
     * @param    string $name optional name
     * @param    mixed $type optional type name
     * @param    mixed $value optional value
     * @param    mixed $element_ns optional namespace of value
     * @param    mixed $type_ns optional namespace of type
     * @param    mixed $attributes associative array of attributes to add to element serialization
     * @access   public
     */
    function __construct($name = 'soapval', $type = false, $value = -1, $element_ns = false, $type_ns = false, $attributes = false) {
        parent::__construct();
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->element_ns = $element_ns;
        $this->type_ns = $type_ns;
        $this->attributes = $attributes;
    }

    /**
     * return serialized value
     *
     * @param    string $use The WSDL use value (encoded|literal)
     * @return    string XML data
     * @access   public
     */
    function serialize($use = 'encoded') {
        return $this->serialize_val($this->value, $this->name, $this->type, $this->element_ns, $this->type_ns, $this->attributes, $use, true);
    }

    /**
     * decodes a soapval object into a PHP native type
     *
     * @return    mixed
     * @access   public
     */
    function decode() {
        return $this->value;
    }

}
