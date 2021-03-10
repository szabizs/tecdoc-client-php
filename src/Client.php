<?php


namespace Baumeister\TecDocClient;


use Baumeister\TecDocClient\Generated\GetAmBrands;
use Baumeister\TecDocClient\Generated\GetAmBrandsResponse;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3Response;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget4;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget4Response;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetsByIds3;
use Baumeister\TecDocClient\Generated\GetArticleLinkedAllLinkingTargetsByIds3Response;
use Baumeister\TecDocClient\Generated\GetArticles;
use Baumeister\TecDocClient\Generated\GetArticlesResponse;
use Baumeister\TecDocClient\Generated\GetChildNodesPattern2;
use Baumeister\TecDocClient\Generated\GetChildNodesPattern2Response;
use Baumeister\TecDocClient\Generated\GetDirectArticlesByIds7;
use Baumeister\TecDocClient\Generated\GetDirectArticlesByIds7Response;
use Baumeister\TecDocClient\Generated\GetLanguages;
use Baumeister\TecDocClient\Generated\GetLanguagesResponse;
use Baumeister\TecDocClient\Generated\GetModelSeries;
use Baumeister\TecDocClient\Generated\GetModelSeriesResponse;
use Baumeister\TecDocClient\Generated\GetMotorsByCarTypeManuIdTerm2;
use Baumeister\TecDocClient\Generated\GetMotorsByCarTypeManuIdTerm2Response;
use Baumeister\TecDocClient\Generated\GetVehicleByIds3;
use Baumeister\TecDocClient\Generated\GetVehicleByIds3Response;
use Baumeister\TecDocClient\Generated\GetManufacturers2;
use Baumeister\TecDocClient\Generated\GetManufacturers2Response;
use Baumeister\TecDocClient\Generated\GetVehicleIdsByCriteria;
use Baumeister\TecDocClient\Generated\GetVehicleIdsByCriteriaResponse;
use Baumeister\TecDocClient\Generated\GetVehicleIdsByMotor2;
use Baumeister\TecDocClient\Generated\GetVehicleIdsByMotor2Response;
use GuzzleHttp\Client as GuzzleClient;
use JsonMapper;
use ReflectionClass;
use ReflectionObject;
use RuntimeException;
use stdClass;

class Client
{
    const TECDOC_JSON_ENDPOINT = "https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=";

    private $client;
    private $url;
    private $providerId;
    private $jsonMapper;

    public function __construct(string $apiKey, int $providerId)
    {
        $this->providerId = $providerId;
        $this->client = new GuzzleClient();
        $this->url = self::TECDOC_JSON_ENDPOINT . $apiKey;
        $this->jsonMapper = new JsonMapper();
    }

    public function getLanguages(GetLanguages $paramsObject): GetLanguagesResponse
    {
        $json = $this->call('getLanguages', $paramsObject);
        return $this->mapJsonToObject($json, new GetLanguagesResponse());
    }

    public function getAmBrands(GetAmBrands $paramsObject): GetAmBrandsResponse
    {
        $json = $this->call('getAmBrands', $paramsObject);
        return $this->mapJsonToObject($json, new GetAmBrandsResponse());
    }

    public function getArticles(GetArticles $paramsObject): GetArticlesResponse
    {
        $json = $this->call('getArticles', $paramsObject);
        return $this->mapJsonToObject($json, new GetArticlesResponse());
    }

    public function getVehicleByIds3(GetVehicleByIds3 $paramsObject): GetVehicleByIds3Response
    {
        Client::addIntermediatePropNamedArray($paramsObject, 'carIds');
        $json = $this->call('getVehicleByIds3', $paramsObject);
        return $this->mapJsonToObject($json, new GetVehicleByIds3Response());
    }

    public function getArticleLinkedAllLinkingTargetsByIds3(GetArticleLinkedAllLinkingTargetsByIds3 $paramsObject): GetArticleLinkedAllLinkingTargetsByIds3Response
    {
        Client::addIntermediatePropNamedArray($paramsObject, 'linkedArticlePairs');
        $json = $this->call('getArticleLinkedAllLinkingTargetsByIds3', $paramsObject);
        return $this->mapJsonToObject($json, new GetArticleLinkedAllLinkingTargetsByIds3Response());
    }

    /**
     * Returns manufacturers
     * @param  GetManufacturers2  $paramObject
     *
     * @return GetManufacturers2Response
     * @throws \JsonMapper_Exception
     */
    public function getManufacturers2(GetManufacturers2 $paramObject): GetManufacturers2Response
    {
        $json = $this->call('getManufacturers2', $paramObject);
        return $this->jsonMapper->map($json, new GetManufacturers2Response());
    }

    /**
     * Returns models for given Manufacturer
     * @param  GetModelSeries  $paramObject
     *
     * @return GetModelSeriesResponse
     * @throws \JsonMapper_Exception
     */
    public function getModelSeries(GetModelSeries $paramObject): GetModelSeriesResponse
    {
        $json = $this->call('getModelSeries', $paramObject);
        return $this->jsonMapper->map($json, new GetModelSeriesResponse());
    }

    /**
     * Returns Engines by manufacturer and model series
     * @param  GetVehicleIdsByCriteria  $paramObject
     *
     * @return GetVehicleIdsByCriteriaResponse
     * @throws \JsonMapper_Exception
     */
    public function getVehicleIdsByCriteria(GetVehicleIdsByCriteria $paramObject): GetVehicleIdsByCriteriaResponse
    {
        $json = $this->call('getVehicleIdsByCriteria', $paramObject);
        return $this->jsonMapper->map($json, new GetVehicleIdsByCriteriaResponse());
    }

    /**
     * Returns categories or nodes for current selected vehicle
     * @param  GetChildNodesPattern2  $paramsObject
     *
     * @return GetChildNodesPattern2Response
     * @throws \JsonMapper_Exception
     */
    public function getChildNodesPattern2(GetChildNodesPattern2 $paramsObject): GetChildNodesPattern2Response
    {
        $json = $this->call('getChildNodesPattern2', $paramsObject);
        return $this->jsonMapper->map($json, new GetChildNodesPattern2Response());
    }

    /**
     * Returns articles based on selected vehicle and selected node
     * @param  GetDirectArticlesByIds7  $paramsObject
     *
     * @return GetDirectArticlesByIds7Response
     * @throws \JsonMapper_Exception
     */
    public function getDirectArticlesByIds7(GetDirectArticlesByIds7 $paramsObject): GetDirectArticlesByIds7Response
    {
        Client::addIntermediatePropNamedArray($paramsObject, 'articleId');
        $json = $this->call('getDirectArticlesByIds7', $paramsObject);

        return $json;
//        return $this->mapJsonToObject($json, new GetDirectArticlesByIds7Response());
    }

    public function getArticleLinkedAllLinkingTarget3(GetArticleLinkedAllLinkingTarget3 $paramsObject): GetArticleLinkedAllLinkingTarget3Response
    {
        $json = $this->call('getArticleLinkedAllLinkingTarget3', $paramsObject);
        // Handle empty API result with invalid property value
        if (sizeof($json->data) == 1 and is_string($json->data[0]->articleLinkages)) {
            $json->data = [];
        }
        return $this->mapJsonToObject($json, new GetArticleLinkedAllLinkingTarget3Response());
    }

    public function getArticleLinkedAllLinkingTarget4(GetArticleLinkedAllLinkingTarget4 $paramsObject): GetArticleLinkedAllLinkingTarget4Response
    {
        $json = $this->call('getArticleLinkedAllLinkingTarget4', $paramsObject);
        // Handle empty API result with invalid property value
        if (sizeof($json->data) == 1 and is_string($json->data[0]->articleLinkages)) {
            $json->data = [];
        }
        return $this->mapJsonToObject($json, new GetArticleLinkedAllLinkingTarget4Response());
    }

    public function getMotorsByCarTypeManuIdTerm2(GetMotorsByCarTypeManuIdTerm2 $paramsObject): GetMotorsByCarTypeManuIdTerm2Response
    {
        $json = $this->call('getMotorsByCarTypeManuIdTerm2', $paramsObject);
        return $this->mapJsonToObject($json, new GetMotorsByCarTypeManuIdTerm2Response());
    }

    public function getVehicleIdsByMotor2(GetVehicleIdsByMotor2 $paramsObject): GetVehicleIdsByMotor2Response
    {
        $json = $this->call('getVehicleIdsByMotor2', $paramsObject);
        return $this->mapJsonToObject($json, new GetVehicleIdsByMotor2Response());
    }

	public function getLinkageTargets(): GetLink
	{
		$json = $this->call('getMotorsByCarTypeManuIdTerm2', $paramsObject);
		return $this->mapJsonToObject($json, new GetMotorsByCarTypeManuIdTerm2Response());
    }

    private function call(string $functionName, $paramsObject)
    {
        $paramsArray = self::recursivelyTransformObjectToArray($paramsObject);
        $paramsArray['provider'] = $this->providerId;
        $jsonBody = [$functionName => $paramsArray];
        $response = $this->client->request('POST', $this->url, [
            'verify' => false,
            'json' => $jsonBody
        ]);
        if ($response->getStatusCode() == 200) {
            $json = json_decode($response->getBody());
            Client::recursivelyRemoveIntermediatePropsNamedArray($json);
            return $json;
        }
        throw new RuntimeException("HTTP request failed with code {$response->getStatusCode()}");
    }

    private static function recursivelyRemoveIntermediatePropsNamedArray($obj, $parentObj = null, $propName = null)
    {
        foreach ($obj as $prop => $val) {
            if ($prop === 'array' && $parentObj != null && $propName != null) {
                $parentObj->$propName = $val;
                unset($obj->array);
            }
            if (is_object($val) or is_array($val)) {
                Client::recursivelyRemoveIntermediatePropsNamedArray($val, $obj, $prop);
            }
        }
    }

    private static function addIntermediatePropNamedArray(object $paramsObject, string $propName): void
    {
        $reflectionClass = new ReflectionClass($paramsObject);
        $reflectionProperty = $reflectionClass->getParentClass()->getProperty($propName);
        $reflectionProperty->setAccessible(true);
        $propValue = new stdClass();
        $propValue->array = $reflectionProperty->getValue($paramsObject);
        $reflectionProperty->setValue($paramsObject, $propValue);
    }

    private static function recursivelyTransformObjectToArray($object)
    {
        if (is_array($object)) {
            $result = [];
            foreach ($object as $k => $v) {
                $result[$k] = self::recursivelyTransformObjectToArray($v);
            }
            return $result;
        } else if (is_object($object)) {
            $result = [];
            try {
                $reflection = $object instanceof stdClass ? new ReflectionObject($object) : new ReflectionClass($object);
                do {
                    $properties = $reflection->getProperties();
                    foreach ($properties as $property) {
                        $property->setAccessible(true);
                        $propName = $property->getName();
                        $result[$propName] = self::recursivelyTransformObjectToArray($property->getValue($object));
                    }
                } while ($reflection = $reflection->getParentClass());
            } catch (\ReflectionException $e) {
                print_r($e);
            }
            return $result;
        }
        return $object;
    }

    private function mapJsonToObject($json, $object)
    {
        try {
            return $this->jsonMapper->map($json, $object);
        } catch (\JsonMapper_Exception $e) {
            // Replace empty string with empty array and try again
            if (preg_match('/JSON property "(.+)" must be an array, string given/', $e->getMessage(), $matches)) {
                $propName = $matches[1];
                $this->findNestedPropAndSetValue($json, $propName, '', []);
                return $this->mapJsonToObject($json, $object);
            }
            throw $e;
        }
    }

    private function findNestedPropAndSetValue($obj, string $propName, $propValue, $newValue)
    {
        if (!is_object($obj)) {
            return;
        }
        foreach ($obj as $p => $v) {
            if ($p === $propName and $v === $propValue) {
                $obj->$p = $newValue;
            }
            if (is_object($v)) {
                $this->findNestedPropAndSetValue($v, $propName, $propValue, $newValue);
            }
            if (is_array($v)) {
                foreach ($v as $k => $v1) {
                    $this->findNestedPropAndSetValue($v1, $propName, $propValue, $newValue);
                }
            }
        }
    }
}
