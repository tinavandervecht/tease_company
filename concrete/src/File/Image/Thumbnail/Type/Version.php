<?php

namespace Concrete\Core\File\Image\Thumbnail\Type;

use Concrete\Core\Entity\File\Version as FileVersion;
use Concrete\Core\File\Image\Thumbnail\ThumbnailFormatService;
use Concrete\Core\File\Image\Thumbnail\Type\Type as ThumbnailType;
use Concrete\Core\Support\Facade\Application;

/**
 * Handles regular and retina thumbnails. e.g. Each thumbnail type has two versions of itself
 * the regular one and the 2x one.
 */
class Version
{
    /**
     * The name of the directory that contains the thumbnails.
     *
     * @var string
     */
    protected $directoryName;

    /**
     * The handle of the thumbnail type version.
     *
     * @var string
     */
    protected $handle;

    /**
     * The name of the thumbnail type version.
     *
     * @var string
     */
    protected $name;

    /**
     * The width of the thumbnails (or the maximum width in case of proportional sizing).
     *
     * @var int|null
     */
    protected $width;

    /**
     * The height of the thumbnails (or the maximum height in case of proportional sizing).
     *
     * @var int|null
     */
    protected $height;

    /**
     * Is this a high-DPI thumbnail type version?
     *
     * @var bool
     */
    protected $isDoubledVersion;

    /**
     * The thumbnail sizing mode (one of the \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type::RESIZE_... constants).
     *
     * @var string
     */
    protected $sizingMode;

    /**
     * Initialize the instance.
     *
     * @param string $directoryName the name of the directory that contains the thumbnails
     * @param string $handle the handle of the thumbnail type version
     * @param string $name the name of the thumbnail type versio
     * @param int|null $width the width of the thumbnails (or the maximum width in case of proportional sizing)
     * @param int|null $height the height of the thumbnails (or the maximum height in case of proportional sizing)
     * @param bool $isDoubledVersion is this a high-DPI thumbnail type version?
     * @param string $sizingMode the thumbnail sizing mode (one of the \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type::RESIZE_... constants)
     */
    public function __construct($directoryName, $handle, $name, $width, $height, $isDoubledVersion = false, $sizingMode = ThumbnailType::RESIZE_DEFAULT)
    {
        $this->setDirectoryName($directoryName);
        $this->setHandle($handle);
        $this->setName($name);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->isDoubledVersion = (bool) $isDoubledVersion;
        $this->setSizingMode($sizingMode);
    }

    /**
     * Get a thumbnail type version given its handle.
     *
     * @param string $handle
     *
     * @return \Concrete\Core\File\Image\Thumbnail\Type\Version|null
     */
    public static function getByHandle($handle)
    {
        $list = Type::getVersionList();
        foreach ($list as $version) {
            if ($version->getHandle() == $handle) {
                return $version;
            }
        }
    }

    /**
     * Set the name of the directory that contains the thumbnails.
     *
     * @param string $directoryName
     */
    public function setDirectoryName($directoryName)
    {
        $this->directoryName = (string) $directoryName;
    }

    /**
     * Get the name of the directory that contains the thumbnails.
     *
     * @return string
     */
    public function getDirectoryName()
    {
        return $this->directoryName;
    }

    /**
     * Set the handle of the thumbnail type version.
     *
     * @param string $handle
     */
    public function setHandle($handle)
    {
        $this->handle = (string) $handle;
    }

    /**
     * Get the handle of the thumbnail type version.
     *
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Set the name of the thumbnail type version.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
    }

    /**
     * Get the name of the thumbnail type version.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the display name for this thumbnail type version (localized and escaped accordingly to $format).
     *
     * @param string $format = 'html'
     *    Escape the result in html format (if $format is 'html').
     *    If $format is 'text' or any other value, the display name won't be escaped.
     *
     * @return string
     */
    public function getDisplayName($format = 'html')
    {
        $value = tc('ThumbnailTypeName', $this->getName());
        if ($this->isDoubledVersion) {
            $value = t('%s (Retina)', $value);
        }
        switch ($format) {
            case 'html':
                return h($value);
            case 'text':
            default:
                return $value;
        }
    }

    /**
     * Set the width of the thumbnails (or the maximum width in case of proportional sizing).
     *
     * @param int|null $width
     */
    public function setWidth($width)
    {
        $this->width = null;
        if ($width && is_numeric($width)) {
            $width = (int) $width;
            if ($width > 0) {
                $this->width = $width;
            }
        }
    }

    /**
     * Get the width of the thumbnails (or the maximum width in case of proportional sizing).
     *
     * @return int|null
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the height of the thumbnails (or the maximum height in case of proportional sizing).
     *
     * @param int|null $height
     */
    public function setHeight($height)
    {
        $this->height = null;
        if ($height && is_numeric($height)) {
            $height = (int) $height;
            if ($height > 0) {
                $this->height = $height;
            }
        }
    }

    /**
     * Get the height of the thumbnails (or the maximum height in case of proportional sizing).
     *
     * @return int|null
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the thumbnail sizing mode.
     *
     * @param string $sizingMode One of the \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type::RESIZE_... constants
     */
    public function setSizingMode($sizingMode)
    {
        $this->sizingMode = (string) $sizingMode;
    }

    /**
     * Get the thumbnail sizing mode.
     *
     * @return string One of the \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type::RESIZE_... constants
     */
    public function getSizingMode()
    {
        return $this->sizingMode;
    }

    /**
     * Get the display name of the thumbnail sizing mode.
     *
     * @return string
     */
    public function getSizingModeDisplayName()
    {
        $sizingModeDisplayNames = [
            ThumbnailType::RESIZE_PROPORTIONAL => t('Proportional'),
            ThumbnailType::RESIZE_EXACT => t('Exact'),
        ];

        return $sizingModeDisplayNames[$this->getSizingMode()];
    }

    /**
     * Get the path to the thumbnail of a file version (relative to the to the storage location root).
     *
     * @param FileVersion $fv the file version for which you want the path of the associated thumbnail
     *
     * @return string
     *
     * @example /thumbnails/file_manager_detail/0000/0000/0000/file.png
     */
    public function getFilePath(FileVersion $fv)
    {
        $app = Application::getFacadeApplication();
        $hi = $app->make('helper/file');
        $ii = $app->make('helper/concrete/file');
        $prefix = $fv->getPrefix();
        $filename = $fv->getFileName();
        $thumbnailFormat = $app->make(ThumbnailFormatService::class)->getFormatForFile($filename);
        switch ($thumbnailFormat) {
            case ThumbnailFormatService::FORMAT_JPEG:
                $extension = 'jpg';
                break;
            case ThumbnailFormatService::FORMAT_PNG:
            default:
                $extension = 'png';
                break;
        }

        return REL_DIR_FILES_THUMBNAILS . '/' . $this->getDirectoryName() . $ii->prefix($prefix, $hi->replaceExtension($filename, $extension));
    }
}
